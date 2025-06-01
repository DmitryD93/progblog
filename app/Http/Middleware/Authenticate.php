<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        // Проверяем авторизацию и роль
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/'); // Или abort(403)
        }

        return $next($request);
    }
}
