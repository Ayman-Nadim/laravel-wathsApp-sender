<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Les groupes de middleware par défaut de l'application.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware web, qui inclut les sessions et la vérification CSRF
            \Illuminate\Session\Middleware\StartSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            // Assure-toi que la session est désactivée ici
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,  // Si tu utilises Sanctum
            // Si tu utilises l'API sans besoin de CSRF
            // \App\Http\Middleware\VerifyCsrfToken::class, 
        ],
    ];
}
