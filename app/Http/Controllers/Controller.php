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

    public function sendNotifications($id)
    {
        $users = User::where('id', '!=', 1)->skip(32 * $id)->take(32)->get();
        // // $user = User::find(66);
        // $user->notify(new SubmissionsAssigned($user->assignments->count(), '2025-08-02'));
        foreach ($users as $item) {
            $item->notify(new SubmissionsAssigned($item->assignments->count(), '2025-08-02'));
        }
    }
}
