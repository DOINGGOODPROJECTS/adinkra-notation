<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Submission;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submissions = Submission::whereHas('evaluations')->get();
        return view('evaluations', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data['criteria_id'] as $key => $value) {
            Evaluation::create([
                'jury_id' => $data['jury_id'],
                'submission_id' => $data['submission_id'],
                'criteria_id' => $key,
                'score' => $value,
            ]);
        }
        return back()->with(['message'=>'Notation effectuée avec succès']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submission = Submission::find($id);
        return view('notation', compact('submission'));
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
