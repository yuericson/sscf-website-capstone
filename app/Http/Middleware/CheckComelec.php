<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckComelec
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('comelec')->check()) {
            return redirect()->route('comelec.login')->withErrors(['error' => 'Access denied.']);
        }

        $response = $next($request);

        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }
}
