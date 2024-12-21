<?php

// app/Http/Controllers/Auth/UnifiedLoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
}

