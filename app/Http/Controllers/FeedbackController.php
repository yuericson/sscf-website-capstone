<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Show the feedback dashboard.
     */
    public function dashboard()
    {
        $feedbacks = DB::table('feedback')->orderBy('created_at', 'desc')->paginate(10);
        $feedbackCount = DB::table('feedback')->count();
        $averageRating = DB::table('feedback')->avg('rating') ?? 0;
    
        return view('Dashboard.feedback-db', compact('feedbacks', 'feedbackCount', 'averageRating'));
    }
    

    /**
     * Store feedback in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comments' => 'required|string',
        ]);

        Feedback::create($request->all());

        return response()->json(['message' => 'Feedback submitted successfully!']);
    }

    /**
     * Delete a specific feedback entry and renumber IDs.
     */
    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete(); // Find and delete the feedback entry
        $this->renumberIds(); // Renumber the IDs after deletion

        return redirect()->route('feedback-db')->with('success', 'Feedback deleted and IDs renumbered.');
    }

    /**
     * Renumber IDs in the feedback table.
     */
    private function renumberIds()
    {
        // Remove AUTO_INCREMENT temporarily
        DB::statement('ALTER TABLE feedback MODIFY COLUMN id INT NOT NULL');

        // Reassign IDs sequentially
        DB::statement('SET @row_number = 0');
        DB::statement('UPDATE feedback SET id = (@row_number:=@row_number+1)');

        // Reapply AUTO_INCREMENT
        DB::statement('ALTER TABLE feedback MODIFY COLUMN id INT NOT NULL AUTO_INCREMENT');
    }
}
