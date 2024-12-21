<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Fetch authenticated user information.
     */
    public function getUserInfo()
    {
        $user = Auth::user(); // Assumes 'web' guard for users

        return response()->json([
            'user' => $user ? [
                'name' => $user->name,
                'avatar' => $user->avatar,
                'email' => $user->email, // Added email
            ] : null,
        ]);
    }

    /**
     * Display the user's profile.
     */
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view your profile.');
        }

        return view('profile', compact('user'));
    }
}
