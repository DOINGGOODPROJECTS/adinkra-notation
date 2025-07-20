<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Notifications\SubmissionsAssigned;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juries = User::where(['role' => 'jury', 'locale'=>'fr'])->get();
        $submissions = Submission::where('lang', 'fr')->orderBy('fullname')->get();
        return view('assignments', compact('submissions', 'juries'));
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
        $request->validate([
            'evaluation_deadline' => ['required'],
            'user_id' => ['required'],
        ]);

        $data = $request->except('_token');
        if (!empty($data['ids'])) {
            $keys = array_keys($data['ids']);
            foreach ($keys as $item) {
                Assignment::create([
                    'user_id'=>$data['user_id'], 
                    'submission_id'=>$item, 
                    'evaluation_deadline'=>$data['evaluation_deadline']
                ]);
            }

            $user = User::find($data['user_id']);
            if ($user) {
                $user->notify(new SubmissionsAssigned(count($keys), $data['evaluation_deadline']));
            }
        }        

        return back()->with(['message'=>"Affectation effectuée avec succès"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
