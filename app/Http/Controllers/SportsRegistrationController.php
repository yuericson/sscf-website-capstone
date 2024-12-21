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
            return redirect()->route('login.google')->with('error', 'Please log in to register.');
        }

        return view('sports-form'); // Show the registration form
    }

    // Handle form submission
    public function submitRegistration(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login.google')->with('error', 'Please log in to register.');
        }

        $existingRegistration = SportsRegistration::where('email', Auth::user()->email)->first();

        if ($existingRegistration) {
            return redirect()->back()->withErrors(['email' => 'You have already registered.']);
        }

        $validatedData = $request->validate([
            'full_name'      => 'required|string|max:255',
            'age'            => 'required|integer|min:0|max:99',
            'gender'         => 'required|string',
            'year_level'     => 'required|string',
            'course'         => 'required|string',
            'college_campus' => 'required|string',
            'sports_event'   => 'required|string',
            'id_number'      => 'required|string|max:20',
            'image'          => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->store('images', 'public') 
            : null;

        SportsRegistration::create([
            'full_name'      => $validatedData['full_name'],
            'email'          => Auth::user()->email,
            'age'            => $validatedData['age'],
            'gender'         => $validatedData['gender'],
            'year_level'     => $validatedData['year_level'],
            'course'         => $validatedData['course'],
            'college_campus' => $validatedData['college_campus'],
            'sports_event'   => $validatedData['sports_event'],
            'id_number'      => $validatedData['id_number'],
            'image'          => $imagePath,
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
            'full_name'      => 'required|string|max:255',
            'age'            => 'required|integer|min:0|max:99',
            'gender'         => 'required|string',
            'year_level'     => 'required|string',
            'course'         => 'required|string',
            'college_campus' => 'required|string',
            'sports_event'   => 'required|string',
            'id_number'      => 'required|string|max:20',
            'image'          => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->store('images', 'public') 
            : $registration->image;

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
        $this->resequenceIDs();

        return redirect()->route('sports-registration-db')->with('success', 'Registration deleted and IDs reordered successfully!');
    }

    // Fetch registration details for modal (new method)
    public function getRegistrationData($id)
    {
        $registration = SportsRegistration::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data'   => $registration,
        ]);
    }

    // Bulk Upload method
    public function bulkUpload(Request $request) 
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file, 'r');
        $header = true;

        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            if ($header) {
                $header = false;
                continue;
            }

            DB::table('sports_registrations')->insertOrIgnore([
                'full_name'      => $row[0],
                'email'          => $row[1],
                'age'            => $row[2],
                'gender'         => $row[3],
                'year_level'     => $row[4],
                'course'         => $row[5],
                'college_campus' => $row[6],
                'sports_event'   => $row[7],
                'id_number'      => $row[8],
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }

        fclose($handle);

        // Resequence IDs kung kinakailangan
        $this->resequenceIDs();

        return back()->with('success', 'Registrations uploaded successfully.');
    }

    // Helper method para i-resequence ang IDs
    protected function resequenceIDs()
    {
        $registrations = DB::table('sports_registrations')->orderBy('id')->get();
        $newId = 1;
        foreach ($registrations as $registration) {
            DB::table('sports_registrations')
                ->where('id', $registration->id)
                ->update(['id' => $newId]);
            $newId++;
        }
        DB::statement('ALTER TABLE sports_registrations AUTO_INCREMENT = 1');
    }

    // Method para sa pag-download ng CSV template
    public function downloadTemplate()
    {
        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="registrations_template.csv"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            // CSV headers para sa sports registrations
            fputcsv($handle, [
                'full_name', 
                'email', 
                'age', 
                'gender', 
                'year_level', 
                'course', 
                'college_campus', 
                'sports_event', 
                'id_number'
            ]);
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Bagong Method: addRegistration nang walang authentication check
    public function addRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'full_name'      => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'age'            => 'required|integer|min:0|max:99',
            'gender'         => 'required|string',
            'year_level'     => 'required|string',
            'course'         => 'required|string',
            'college_campus' => 'required|string',
            'sports_event'   => 'required|string',
            'id_number'      => 'required|string|max:20',
            'image'          => 'nullable|image|max:2048',
        ]);

        $imagePath = $request->file('image') 
            ? $request->file('image')->store('images', 'public') 
            : null;

        SportsRegistration::create([
            'full_name'      => $validatedData['full_name'],
            'email'          => $validatedData['email'],
            'age'            => $validatedData['age'],
            'gender'         => $validatedData['gender'],
            'year_level'     => $validatedData['year_level'],
            'course'         => $validatedData['course'],
            'college_campus' => $validatedData['college_campus'],
            'sports_event'   => $validatedData['sports_event'],
            'id_number'      => $validatedData['id_number'],
            'image'          => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Registration added successfully!');
    }

    // Bagong Method para sa pag-print batay sa College/Campus
    public function printByCampus($campus) {
        $registrations = DB::table('sports_registrations')
                           ->where('college_campus', $campus)
                           ->get();
        return view('print_campus', compact('registrations', 'campus'));
    }
    public function showSportsList()
    {
        // Fetch distinct sports events in alphabetical order
        $sports = SportsRegistration::select('sports_event')
            ->distinct()
            ->orderBy('sports_event', 'asc')
            ->pluck('sports_event');
    
        // Pass sports to the view
        return view('sports-registration', compact('sports'));
    }
    

    public function showRegistrationsBySport($sport)
    {
        // Kunin ang mga rehistrasyon para sa napiling sport
        $registrations = SportsRegistration::where('sports_event', $sport)
            ->orderBy('full_name', 'asc')
            ->get();
    
        // Ipasa ang mga data sa view
        return view('registrations-list', compact('registrations', 'sport'));
    }
    
    
}
