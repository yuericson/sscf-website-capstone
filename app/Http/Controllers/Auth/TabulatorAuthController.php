<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabulatorAuthController extends Controller
{
    /**
     * Show the login form for Tabulator.
     */
    public function showLoginForm()
    {
        return view('auth.tabulator-login'); // Make sure this view exists
    }

    /**
     * Handle login logic for Tabulator.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('tabulator')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('tabulator.dashboard'); // Redirects to tabulator dashboard
        }
    
        return back()->withErrors(['email' => 'Invalid TABULATOR credentials.']);
    }
    

    /**
     * Handle logout logic for Tabulator.
     */
    public function logout(Request $request)
{
    Auth::guard('tabulator')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect()->route('tabulator.login')->with('status', 'You have been logged out.');
}

}
