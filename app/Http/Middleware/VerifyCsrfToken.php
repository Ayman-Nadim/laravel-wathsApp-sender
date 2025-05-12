<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCsrfToken
{
    /**
     * Les URIs qui devraient être exclues de la vérification CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/send',  // Exclure la route /send de la vérification CSRF
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Exécuter la vérification CSRF normale pour toutes les autres routes sauf /send
        return $next($request);
    }
}
