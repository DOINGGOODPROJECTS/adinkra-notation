<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Submission;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() 
    {
        $submissions = Submission::all();
        if(auth()->user()->role == 'jury') {
            $submissions = Submission::where('assigned_to', auth()->id())->get();
        }
        $topSubmissions = $submissions->filter(fn ($item) => $item->evaluations && $item->evaluations->isNotEmpty())
            ->sortByDesc(fn ($item) => $item->evaluations->sum('score'))
            ->take(5);
        return view('dashboard', compact('submissions', 'topSubmissions'));
    }

    public function affectations() 
    {
        $juries = User::where('role', 'jury')->get();
        $submissions = Submission::whereNull('assigned_to')->whereNull('evaluation_deadline')->get();
        return view('affectations', compact('submissions', 'juries'));
    }

    public function setLocaleSwitch($locale)
    {
        if (auth()->check()) {
            $connected = auth()->user();
            $connected->update(compact('locale'));
        }
        session()->put(compact('locale'));
        app()->setLocale(session('locale'));
        return back()->with(['message'=>'']);
    }
}
