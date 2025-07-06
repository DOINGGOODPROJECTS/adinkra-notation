<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Imports\SubmissionsImport;
use Maatwebsite\Excel\Facades\Excel;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = Submission::all();
        if(auth()->user()->role == 'jury') {
            $submissions = Submission::whereHas('assignments', fn ($item) => $item->where('user_id', auth()->id()))->get();
        }
        return view('submissions', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,xls,csv|max:25600']);

        $import = new SubmissionsImport();
        
        try {
            Excel::import($import, $request->file('file'));
            
            // Ajoutez le logging ici (juste avant le return)
            Log::info('Import submission', [
                'imported' => $import->getImportedCount(),
                'skipped' => $import->getSkippedCount(),
                'file' => $request->file('file')->getClientOriginalName(),
                'user_id' => auth()->id() ?? 'guest' // Optionnel : suivi de l'utilisateur
            ]);

            return back()->with([
                'success' => sprintf(
                    'Import réussi : %d/%d lignes traitées',
                    $import->getImportedCount(),
                    $import->getTotalCount()
                )
            ]);

        } catch (\Exception $e) {
            // Log des erreurs (optionnel mais recommandé)
            Log::error('Import failed', [
                'error' => $e->getMessage(),
                'file' => $request->file('file')->getClientOriginalName()
            ]);

            return back()->withErrors(['file' => 'Erreur lors de l\'import : '.$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submission = Submission::find($id);
        return view('submission', compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
