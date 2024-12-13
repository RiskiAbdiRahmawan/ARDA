<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'manager') {
            return $next($request);
        }
        // Jika user tidak memiliki role pemilik, redirect ke halaman login atau halaman lain
        return redirect('/')->withErrors([
            'role' => 'You do not have access to this page.',
        ]);
    }
}
