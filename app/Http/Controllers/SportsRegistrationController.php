<?php

namespace App\Http\Controllers;

use App\Models\SportsRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SportsRegistrationController extends Controller
{
    // Display the sports registration form
    public function showForm()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to register.');
        }

        return view('sports-form'); // Show the registration form
    }

    // Handle form submission
    public function submitRegistration(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to register.');
        }

        $existingRegistration = SportsRegistration::where('email', Auth::user()->email)->first();

        if ($existingRegistration) {
            return redirect()->back()->withErrors(['email' => 'You have already registered.']);
        }

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:99',
            'gender' => 'required|string',
            'year_level' => 'required|string',
            'course' => 'required|string',
            'college_campus' => 'required|string',
            'sports_event' => 'required|string',
            'id_number' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        SportsRegistration::create([
            'full_name' => $validatedData['full_name'],
            'email' => Auth::user()->email,
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'year_level' => $validatedData['year_level'],
            'course' => $validatedData['course'],
            'college_campus' => $validatedData['college_campus'],
            'sports_event' => $validatedData['sports_event'],
            'id_number' => $validatedData['id_number'],
            'image' => $imagePath,
        ]);

        return redirect()->route('sports.form')->with('success', true);
    }

    // Check registration status for modal logic
    public function checkRegistration()
    {
        if (!Auth::check()) {
            return response()->json(['authenticated' => false], 401);
        }

        $alreadyRegistered = SportsRegistration::where('email', Auth::user()->email)->exists();

        return response()->json(['alreadyRegistered' => $alreadyRegistered]);
    }

    // Display the sports registration dashboard
    public function dashboard()
    {
        $registrations = DB::table('sports_registrations')->get();
        $registrationsCount = $registrations->count();

        return view('sports-registration-db', [
            'data' => $registrations,
            'registrationsCount' => $registrationsCount,
        ]);
    }

    // Handle edit registration
    public function edit(Request $request, $id)
    {
        $registration = SportsRegistration::findOrFail($id);

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:99',
            'gender' => 'required|string',
            'year_level' => 'required|string',
            'course' => 'required|string',
            'college_campus' => 'required|string',
            'sports_event' => 'required|string',
            'id_number' => 'required|string|max:20',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : $registration->image;

        $registration->update(array_merge($validatedData, ['image' => $imagePath]));

        return redirect()->route('sports-registration-db')->with('success', 'Registration updated successfully!');
    }

    // Handle delete registration
    public function delete($id)
    {
        // Delete the record
        $registration = SportsRegistration::findOrFail($id);
        $registration->delete();

        // Reorder IDs
        $registrations = SportsRegistration::orderBy('id')->get(); // Get all records ordered by current ID
        $newId = 1;

        foreach ($registrations as $registration) {
            $registration->id = $newId;
            $registration->save(); // Update the record with the new ID
            $newId++;
        }

        // Reset the auto-increment value
        DB::statement('ALTER TABLE sports_registrations AUTO_INCREMENT = 1');

        return redirect()->route('sports-registration-db')->with('success', 'Registration deleted and IDs reordered successfully!');
    }

    // Fetch registration details for modal (new method)
    public function getRegistrationData($id)
    {
        $registration = SportsRegistration::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $registration,
        ]);
    }
}
