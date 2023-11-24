<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Cambia la redirección a una respuesta JSON no autenticada para una API
        if (! $request->expectsJson()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
