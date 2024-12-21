<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTabulator
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('tabulator')->check()) {
            return redirect()->route('tabulator.login')->withErrors(['error' => 'Access denied.']);
        }

        $response = $next($request);

        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }
}
