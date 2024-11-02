<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VPAMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the authenticated user has the 'admin' role
         if (Auth::check() && Auth::user()->role === 'Admin' && Auth::user()->position === 'Vice President for Administration') {
            return $next($request);
        }

        // Redirect non-admin users to home with an error message
        abort(403);
    }
}
