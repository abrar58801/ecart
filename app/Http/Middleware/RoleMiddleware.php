<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // If the user does not have the specified role, redirect them
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            return redirect()->route('login')->with('error', 'You do not have the required role to access this page.');
        }

        // Proceed with the request if the role check passes
        return $next($request);
    }
}
