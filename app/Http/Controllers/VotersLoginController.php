<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VotersLoginController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'password' => 'required',
        ]);

        $voter = DB::table('voters_login')->where('student_id', $request->student_id)->first();

        if ($voter && Hash::check($request->password, $voter->password)) {
            session(['voter_id' => $voter->id]);
            return redirect()->route('election.form');
        }

        return back()->withErrors(['Invalid credentials.']);
    }

   // Show dashboard
   public function index()
   {
       $voters = DB::table('voters_login')->orderBy('id')->paginate(10);
       $count = DB::table('voters_login')->count();

       return view('dashboard', compact('voters', 'count'));
   }

   // Add a new voter
   public function store(Request $request)
   {
       $request->validate([
           'student_id' => 'required|unique:voters_login|regex:/^21L-\d{4}$/',
           'name' => 'required',
           'email' => 'required|email|unique:voters_login',
           'password' => 'required',
           'college' => 'required',
       ]);

       DB::table('voters_login')->insert([
           'student_id' => $request->student_id,
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'college' => $request->college,
           'created_at' => now(),
           'updated_at' => now(),
       ]);

       return back()->with('success', 'Voter added successfully.');
   }

   // Update an existing voter
   public function update(Request $request, $id)
   {
       $request->validate([
           'student_id' => 'required|regex:/^21L-\d{4}$/|unique:voters_login,student_id,' . $id,
           'name' => 'required',
           'email' => 'required|email|unique:voters_login,email,' . $id,
           'college' => 'required',
       ]);

       DB::table('voters_login')->where('id', $id)->update([
           'student_id' => $request->student_id,
           'name' => $request->name,
           'email' => $request->email,
           'college' => $request->college,
           'updated_at' => now(),
       ]);

       return back()->with('success', 'Voter updated successfully.');
   }

   // Delete a voter and resequence IDs
   public function destroy($id)
   {
       DB::table('voters_login')->where('id', $id)->delete();
       $this->resequenceIDs();

       return back()->with('success', 'Voter deleted successfully.');
   }

   // Resequence IDs after deletion
   private function resequenceIDs()
   {
       $voters = DB::table('voters_login')->orderBy('id')->get();
       $newID = 1;

       foreach ($voters as $voter) {
           DB::table('voters_login')->where('id', $voter->id)->update(['id' => $newID]);
           $newID++;
       }
   }
}