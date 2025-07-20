<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Submission;
use App\Notifications\SubmissionsAssigned;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard() 
    {
        $submissions = Submission::with('assignments')->get();
        if(auth()->user()->role == 'jury') {
            $submissions = Submission::whereHas('assignments', fn ($item) => $item->where('user_id', auth()->id()))->get();
        }
        $topSubmissions = $submissions->filter(fn ($item) => $item->evaluations && $item->evaluations->isNotEmpty())
            ->sortByDesc(fn ($item) => $item->evaluations->sum('score'))
            ->take(5);
        return view('dashboard', compact('submissions', 'topSubmissions'));
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

    public function sendNotifications()
    {
        $users = User::where('id', '!=', 1)->get();
        foreach ($users as $item) {
            $item->notify(new SubmissionsAssigned(count($item->assignments->count()), '2025-08-02'));
        }
    }
}
