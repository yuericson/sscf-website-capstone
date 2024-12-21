<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnifiedLoginController extends Controller
{
    /**
     * I-display ang unified login form.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('index'); // I-redirect ang authenticated na users sa home
        }

        return view('auth.login');
    }

    /**
     * Update last_login_at after successful login.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        $user->update(['last_login_at' => now()]);
    }
}
