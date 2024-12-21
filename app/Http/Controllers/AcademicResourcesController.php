<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicResourcesController extends Controller
{
    /**
     * Display the application's home page.
     */
    public function index()
    {
        return view('academic-resources-db'); // Siguraduhin na mayroon kang home.blade.php sa resources/views
    }
}
