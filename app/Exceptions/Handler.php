<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Custom render for handling specific exceptions like TokenMismatch.
     */
    public function render($request, Throwable $exception)
    {
        // Gérer l'erreur 419 et rediriger vers login
        if ($exception instanceof TokenMismatchException) {
            return redirect()->route('login')->withErrors([
                'message' => 'Votre session a expiré. Veuillez vous reconnecter.'
            ]);
        }

        return parent::render($request, $exception);
    }
}
