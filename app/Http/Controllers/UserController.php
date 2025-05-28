<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return back()->with(['message'=>"Membre du Jury ajouté avec succès"]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function affectation(Request $request)
    {
        $request->validate([
            'evaluation_deadline' => ['required'],
            'assigned_to' => ['required'],
        ]);

        $data = $request->except('_token');
        if (!empty($data['ids'])) {
            $keys = array_keys($data['ids']);
        
            Submission::whereIn('id', $keys)->update([
                'assigned_to'=>$data['assigned_to'], 
                'evaluation_deadline'=>$data['evaluation_deadline']
            ]);
        }        

        return back()->with(['message'=>"Membre du Jury ajouté avec succès"]);
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
