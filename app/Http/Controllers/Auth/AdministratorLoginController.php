<?php

// app/Http/Controllers/Auth/AdministratorLoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorLoginController extends Controller
{
    /**
     * Show the unified login form.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Pointing to the unified login view
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // Attempt to log the administrator in using the 'administrator' guard
        if (Auth::guard('administrator')->attempt($credentials, $request->filled('remember'))) {
            // Authentication passed
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log the administrator out of the application.
     */
    public function logout(Request $request)
    {
        Auth::guard('administrator')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect with cache-control headers
        return redirect('login')->with('status', 'You have been logged out!')
                                 ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                                 ->header('Pragma', 'no-cache')
                                 ->header('Expires', '0');
    }
}
