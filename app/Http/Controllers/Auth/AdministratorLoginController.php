<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorLoginController extends Controller
{
    /**
     * Show the login form based on the requested route.
     */
    public function showLoginForm(Request $request)
    {
        if ($request->is('admin/*')) {
            return view('auth.admin-login');
        }

        if ($request->is('comelec/*')) {
            return view('auth.comelec-login');
        }

        if ($request->is('tabulator/*')) {
            return view('auth.tabulator-login');
        }

        if ($request->is('tabulations/*')) { // ✅ Fixed Prefix
            return view('auth.tabulation-login');
        }

        abort(404, 'Login page not found.');
    }

    /**
     * Handle login logic for all user types.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // ✅ Administrator login
        if ($request->is('admin/*')) {
            if (Auth::guard('administrator')->attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
            return back()->withErrors(['email' => 'Invalid ADMINISTRATOR credentials.']);
        }

        // ✅ COMELEC login
        if ($request->is('comelec/*')) {
            if (Auth::guard('comelec')->attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->route('comelec.dashboard');
            }
            return back()->withErrors(['email' => 'Invalid COMELEC credentials.']);
        }

        // ✅ Tabulator login
        if ($request->is('tabulator/*')) {
            if (Auth::guard('tabulator')->attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->route('tabulator.dashboard');
            }
            return back()->withErrors(['email' => 'Invalid TABULATOR credentials.']);
        }

        // ✅ Tabulation login (Fixed: Uses "tabulations/*")
        if ($request->is('tabulations/*')) {
            if (Auth::guard('tabulation')->attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->route('tabulations.dashboard'); // ✅ Fixed Route Name
            }
            return back()->withErrors(['email' => 'Invalid TABULATION credentials.']);
        }

        return abort(404, 'Invalid login route.');
    }

    /**
     * Handle logout logic for all user types.
     */
    public function logout(Request $request)
    {
        if ($request->is('admin/*') && Auth::guard('administrator')->check()) {
            Auth::guard('administrator')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login')->with('status', 'You have been logged out.');
        }

        if ($request->is('comelec/*') && Auth::guard('comelec')->check()) {
            Auth::guard('comelec')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('comelec.login')->with('status', 'You have been logged out.');
        }

        if ($request->is('tabulator/*') && Auth::guard('tabulator')->check()) {
            Auth::guard('tabulator')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('tabulator.login')->with('status', 'You have been logged out.');
        }

        // ✅ Tabulation logout (Fixed: Uses "tabulations/*")
        if ($request->is('tabulations/*') && Auth::guard('tabulation')->check()) {
            Auth::guard('tabulation')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('tabulations.login')->with('status', 'You have been logged out.');
        }

        return redirect('/')->withErrors(['error' => 'Invalid logout request.']);
    }

    /**
     * Determine the active guard.
     */
    private function getActiveGuard()
    {
        if (Auth::guard('administrator')->check()) {
            return 'administrator';
        }

        if (Auth::guard('comelec')->check()) {
            return 'comelec';
        }

        if (Auth::guard('tabulator')->check()) {
            return 'tabulator';
        }

        if (Auth::guard('tabulation')->check()) {
            return 'tabulation';
        }

        return null;
    }
}
