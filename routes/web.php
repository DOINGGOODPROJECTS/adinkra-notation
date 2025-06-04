<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\EvaluationCriteriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{locale}/locale', [Controller::class, 'setLocaleSwitch'])->name('locales.switch');

Route::middleware(['auth', 'verified', 'locale'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/juries', [JuryController::class, 'index'])->name('juries.index');
    
    Route::resource('users', UserController::class);
    Route::resource('submissions', SubmissionController::class);
    Route::resource('evaluations', EvaluationController::class);
    Route::resource('assignments', AssignmentController::class);
    Route::resource('criteria', EvaluationCriteriaController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-mail', function () {
    Mail::raw('Ceci est un email de test envoyé depuis Laravel via Hostinger.', function ($message) {
        $message->to('yamooon664@gmail.com')
                ->subject('Test Email Laravel → Hostinger');
    });

    return 'Email envoyé avec succès !';
});

require __DIR__.'/auth.php';
