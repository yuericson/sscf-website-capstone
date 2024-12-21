<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the authenticated administrator
        $admin = Auth::guard('administrator')->user();

        // If not authenticated or does not have admin privileges, redirect or abort
        if (!$admin || !in_array($admin->role, ['admin', 'superadmin'])) {
            // Redirect to admin login with an error message
            return redirect()->route('admin.login')->withErrors(['error' => 'Access denied.']);
        }

        // Prevent caching of sensitive pages
        $response = $next($request);

        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }
}
