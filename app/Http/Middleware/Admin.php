<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Http\Controllers\PatientlistController; 
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure $next
     * @param \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the 'admin' role
        if (Auth::check() && Auth::user()->roles->name == "admin") {
            return $next($request);
        } else {
            // Redirect to a specific route or back to the previous page
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }
}
