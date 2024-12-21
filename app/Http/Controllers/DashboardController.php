<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the administrator dashboard.
     */
    public function index()
    {
        // Retrieve the authenticated administrator
        $admin = Auth::guard('administrator')->user();

        if (!$admin) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please log in first.']);
        }

        return view('dashboard', compact('admin'));
    }
}
