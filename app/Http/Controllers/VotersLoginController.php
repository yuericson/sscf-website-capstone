<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\LocalSection;
use App\Models\LocalSubtitle;
use App\Models\CandidateImage;
use App\Models\ElectionSetting;
use Carbon\Carbon;


class VotersLoginController extends Controller

{
    
    public function printAll()
{
    // Fetch all voters, excluding any sensitive information
    $voters = DB::table('voters_login')
        ->select('id', 'student_id', 'name', 'email', 'college') // Exclude password or other sensitive fields
        ->orderBy('id', 'asc')
        ->get();

    return view('voters.printAll', compact('voters'));
}

    public function resetTimes()
    {
        $electionSetting = ElectionSetting::first();

        if ($electionSetting) {
            // Reset start_time and end_time to null
            $electionSetting->update([
                'start_time' => null,
                'end_time' => null,
            ]);

            return redirect()->back()->with('success', 'Election times have been reset.');
        }

        return redirect()->back()->with('error', 'No election settings found to reset.');
    }
    public function loginPage(Request $request)
    {
        $electionSetting = ElectionSetting::first();
    
        if (!$electionSetting) {
            return view('login', [
                'electionSetting' => null,
                'isBeforeStart' => false,
                'isOngoing' => false,
                'isAfterEnd' => false,
            ])->withErrors(['Election settings are not configured.']);
        }
    
        $now = Carbon::now();
        $startTime = Carbon::parse($electionSetting->start_time);
        $endTime = Carbon::parse($electionSetting->end_time);
    
        // Determine election status
        $isBeforeStart = $now->lt($startTime);
        $isOngoing = $now->between($startTime, $endTime);
        $isAfterEnd = $now->gt($endTime);
    
        return view('login', compact('electionSetting', 'isBeforeStart', 'isOngoing', 'isAfterEnd'));
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'password' => 'required',
        ]);
    
        // Check election settings
        $electionSetting = ElectionSetting::first();
    
        if (!$electionSetting) {
            return back()->withErrors(['Election settings are not configured.']);
        }
    
        $now = Carbon::now();
        $startTime = Carbon::parse($electionSetting->start_time);
        $endTime = Carbon::parse($electionSetting->end_time);
    
        // Check if election is ongoing
        if ($now->lt($startTime)) {
            return back()->withErrors(['The election has not started yet.']);
        }
    
        if ($now->gt($endTime)) {
            return back()->withErrors(['The election has already ended.']);
        }
    
        // Check voter credentials
        $voter = DB::table('voters_login')->where('student_id', $request->student_id)->first();
    
        if ($voter && Hash::check($request->password, $voter->password)) {
            // Check if the voter has already voted
            $alreadyVoted = DB::table('election_voters_vote')->where('voter_id', $voter->id)->exists();
            if ($alreadyVoted) {
                return redirect()->back()->with('alreadyVoted', true);
            }
    
            // Allow the voter to proceed
            session(['voter_id' => $voter->id]);
            return redirect()->route('election.form');
        }
    
        return back()->withErrors(['Invalid credentials.']);
    }




    public function updateElectionTimes(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $electionSetting = ElectionSetting::first();

        if ($electionSetting) {
            // Update existing settings
            $electionSetting->update([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        } else {
            // Create new settings if not exists
            ElectionSetting::create([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        }

        return redirect()->back()->with('success', 'Election times updated successfully.');
    }





    public function index()
    {
        // Fetch voters with the count of votes
        $voters = DB::table('voters_login')
            ->select('voters_login.*')
            ->selectRaw('(SELECT COUNT(*) FROM election_voters_vote WHERE election_voters_vote.voter_id = voters_login.id) as votes_count')
            ->orderBy('voters_login.id')
            ->paginate(10);

        $positions = DB::table('election_positions')->get();
        $candidates = DB::table('election_candidates')->get();

        $statistics = [
            'total_voters' => DB::table('voters_login')->count(),
            'total_positions' => DB::table('election_positions')->count(),
            'total_candidates' => DB::table('election_candidates')->count(),
        ];

        return view('dashboard', compact('voters', 'positions', 'candidates', 'statistics'));
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

        // Resequence IDs
        $this->resequenceIDs();

        return back()->with('success', 'Voter added successfully.');
    }

    // Bulk upload voters
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

            DB::table('voters_login')->insertOrIgnore([
                'student_id' => $row[0],
                'name' => $row[1],
                'email' => $row[2],
                'password' => Hash::make($row[3]),
                'college' => $row[4],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        fclose($handle);

        // Resequence IDs
        $this->resequenceIDs();

        return back()->with('success', 'Voters uploaded successfully.');
    }

    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="voters_template.csv"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            // CSV headers
            fputcsv($handle, ['student_id', 'name', 'email', 'password', 'college']);
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
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
        try {
            // Check if the voter has any votes
            $voteExists = DB::table('election_voters_vote')->where('voter_id', $id)->exists();

            if ($voteExists) {
                return back()->withErrors('Cannot delete voter who has already voted.');
            }

            // Delete the voter
            DB::table('voters_login')->where('id', $id)->delete();

            // Resequence IDs
            $this->resequenceIDs();

            return back()->with('success', 'Voter deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('Error deleting voter: ' . $e->getMessage());
        }
    }

    // Add a new position
    public function storePosition(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:election_positions,name',
        ]);

        DB::table('election_positions')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Resequence position IDs
        $this->resequencePositionIDs();

        return back()->with('success', 'Position added successfully.');
    }

    // Update a position
    public function updatePosition(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:election_positions,name,' . $id,
        ]);

        DB::table('election_positions')->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Position updated successfully.');
    }

    // Delete a position
    public function destroyPosition($id)
    {
        DB::table('election_positions')->where('id', $id)->delete();

        // Resequence position IDs
        $this->resequencePositionIDs();

        return back()->with('success', 'Position deleted successfully.');
    }

    // Add a new candidate
    public function storeCandidate(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:election_candidates,name', 
            'position_id' => 'required|exists:election_positions,id',
        ]);
    
        DB::table('election_candidates')->insert([
            'name' => $request->name,
            'position_id' => $request->position_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Resequence candidate IDs
        $this->resequenceCandidateIDs();
    
        return back()->with('success', 'Candidate added successfully.');
    }
    
    // Update a candidate
    public function updateCandidate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position_id' => 'required|exists:election_positions,id',
        ]);

        DB::table('election_candidates')->where('id', $id)->update([
            'name' => $request->name,
            'position_id' => $request->position_id,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Candidate updated successfully.');
    }

    // Delete a candidate
    public function destroyCandidate($id)
    {
        DB::table('election_candidates')->where('id', $id)->delete();

        // Resequence candidate IDs
        $this->resequenceCandidateIDs();

        return back()->with('success', 'Candidate deleted successfully.');
    }

    // Show the voting form pre-filled with voter details
    public function getVotingForm()
    {
        $voterId = session('voter_id');

        if (!$voterId) {
            return redirect()->route('login')->withErrors('Please log in to vote.');
        }

        $voter = DB::table('voters_login')->where('id', $voterId)->first();

        if (!$voter) {
            return redirect()->route('login')->withErrors('Voter account not found.');
        }

        $positions = DB::table('election_positions')->get();
        $candidates = DB::table('election_candidates')->get();

        return view('local-election-form', compact('voter', 'positions', 'candidates'));
    }

    // Reset auto-increment value
    private function resetAutoIncrement()
    {
        $maxID = DB::table('voters_login')->max('id') ?? 0;
        DB::statement("ALTER TABLE voters_login AUTO_INCREMENT = " . ($maxID + 1));
    }

    // Resequence IDs and reset auto-increment for voters
    private function resequenceIDs()
    {
        $voters = DB::table('voters_login')->orderBy('id')->get();
        $newID = 1;

        foreach ($voters as $voter) {
            DB::table('voters_login')->where('id', $voter->id)->update(['id' => $newID]);
            $newID++;
        }

        $this->resetAutoIncrement();
    }

    // Private method to resequence IDs for positions
    private function resequencePositionIDs()
    {
        $positions = DB::table('election_positions')->orderBy('id')->get();
        $newID = 1;

        foreach ($positions as $position) {
            DB::table('election_positions')->where('id', $position->id)->update(['id' => $newID]);
            $newID++;
        }

        $maxID = DB::table('election_positions')->max('id') ?? 0;
        DB::statement("ALTER TABLE election_positions AUTO_INCREMENT = " . ($maxID + 1));
    }

    // Private method to resequence IDs for candidates
    private function resequenceCandidateIDs()
    {
        $candidates = DB::table('election_candidates')->orderBy('id')->get();
        $newID = 1;

        foreach ($candidates as $candidate) {
            DB::table('election_candidates')->where('id', $candidate->id)->update(['id' => $newID]);
            $newID++;
        }

        $maxID = DB::table('election_candidates')->max('id') ?? 0;
        DB::statement("ALTER TABLE election_candidates AUTO_INCREMENT = " . ($maxID + 1));
    }

    public function storeVote(Request $request)
    {
        $voterId = session('voter_id');

        if (!$voterId) {
            return redirect()->route('login')->withErrors('Please log in to vote.');
        }

        $voter = DB::table('voters_login')->where('id', $voterId)->first();

        if (!$voter) {
            return redirect()->route('login')->withErrors('Voter account not found.');
        }

        // Prepare votes data
        $votes = [];
        $positions = DB::table('election_positions')->get();

        foreach ($positions as $position) {
            $candidateId = $request->input('votes.' . $position->id);

            if ($candidateId) {
                if ($candidateId === 'abstain') {
                    // Record abstain choice for the position
                    $votes[$position->name] = 'Abstain';
                } else {
                    $candidate = DB::table('election_candidates')
                        ->where('id', $candidateId)
                        ->where('position_id', $position->id)
                        ->first();

                    if ($candidate) {
                        $votes[$position->name] = $candidate->name;
                    } else {
                        return redirect()->route('election.form')
                            ->withErrors("Invalid candidate selected for position: {$position->name}");
                    }
                }
            }
        }

        // Save consolidated vote
        DB::table('election_voters_vote')->updateOrInsert(
            ['voter_id' => $voterId],
            [
                'voter_name' => $voter->name,
                'votes' => json_encode($votes),
                'updated_at' => now(),
            ]
        );

        return redirect()->route('votes.index')->with('success', 'Your votes have been submitted successfully.');
    }

    public function viewVotes()
    {
        // Statistics
        $statistics = [
            'total_voters' => DB::table('voters_login')->count(),
            'total_positions' => DB::table('election_positions')->count(),
            'total_candidates' => DB::table('election_candidates')->count(),
            'total_votes' => DB::table('election_voters_vote')->count(),
        ];

        // Votes Details
        $votes = DB::table('election_voters_vote')
            ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
            ->select(
                'voters_login.student_id as student_id',
                'voters_login.name as voter_name',
                'election_voters_vote.votes',
                'election_voters_vote.updated_at as voted_at'
            )
            ->orderBy('election_voters_vote.updated_at', 'desc')
            ->get();

        // Format votes for display
        $formattedVotes = $votes->map(function ($vote) {
            $votesData = json_decode($vote->votes, true); // Decode JSON votes
            $formatted = '';
            foreach ($votesData as $position => $candidate) {
                $formatted .= "<strong>{$position}</strong>: {$candidate}<br>";
            }
            return [
                'student_id' => $vote->student_id,
                'voter_name' => $vote->voter_name,
                'votes' => $formatted,
                'voted_at' => $vote->voted_at,
            ];
        });

        // Votes by College
        $votersByCollege = DB::table('voters_login')
            ->select('college', DB::raw('count(*) as total'))
            ->groupBy('college')
            ->get();

        $votesByCollege = DB::table('election_voters_vote')
            ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
            ->select('voters_login.college', DB::raw('count(*) as total_votes'))
            ->groupBy('voters_login.college')
            ->get();

        // Prepare data for charts
        $votesByPositionAndCandidate = DB::table('election_candidates')
            ->join('election_positions', 'election_candidates.position_id', '=', 'election_positions.id')
            ->select(
                'election_positions.name as position_name',
                'election_candidates.name as candidate_name',
                DB::raw('(SELECT COUNT(*) FROM election_voters_vote WHERE JSON_CONTAINS(election_voters_vote.votes, JSON_OBJECT(election_positions.name, election_candidates.name))) as total_votes')
            )
            ->groupBy('election_positions.name', 'election_candidates.name')
            ->get();

        // Unique Candidates for Color Assignment
        $uniqueCandidates = DB::table('election_candidates')->pluck('name')->toArray();

        return view('local-election', compact(
            'statistics',
            'formattedVotes',
            'votersByCollege',
            'votesByCollege',
            'votesByPositionAndCandidate',
            'uniqueCandidates'
        ));
    }

    // Display the public election page
    public function showElection()
    {
        $sections = LocalSection::with('subtitles.electionimages')->get();
        return view('local-election', compact('sections'));
    }

    // Display the dashboard
    public function showDashboard()
    {
        $sections = LocalSection::with('subtitles.electionimages')->get();
        return view('local-election-db', compact('sections'));
    }

    // Sections CRUD
    public function addSection(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Check if a section with the same title already exists
        $existingSection = LocalSection::where('title', $request->title)->first();

        if ($existingSection) {
            return redirect()->back()->with('error', 'Section with this title already exists.');
        }

        // Check if there is already a section in the database
        $existingSectionsCount = LocalSection::count();

        if ($existingSectionsCount > 0) {
            return redirect()->back()->with('error', 'You can only add a new section if there are no existing sections.');
        }

        LocalSection::create(['title' => $request->title]);

        return redirect()->back()->with('success', 'Section added successfully.');
    }

    public function editSection(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $section = LocalSection::findOrFail($id);
        $section->update(['title' => $request->title]);

        return redirect()->back()->with('success', 'Section updated successfully.');
    }

    public function deleteSection($id)
    {
        $section = LocalSection::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    // Subtitles CRUD
    public function addSubtitle(Request $request, $section_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        LocalSubtitle::create([
            'section_id' => $section_id,
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Subtitle added successfully.');
    }

    public function editSubtitle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $subtitle = LocalSubtitle::findOrFail($id);
        $subtitle->update(['title' => $request->title]);

        return redirect()->back()->with('success', 'Subtitle updated successfully.');
    }

    public function deleteSubtitle($id)
    {
        $subtitle = LocalSubtitle::findOrFail($id);
        $subtitle->delete();

        return redirect()->back()->with('success', 'Subtitle deleted successfully.');
    }

    // ElectionImages CRUD
    public function uploadElectionImage(Request $request, $subtitle_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Store the image in the 'public/candidate_images' directory
            $path = $request->file('image')->store('candidate_images', 'public');

            // Save the election image information in the database
            CandidateImage::create([
                'subtitle_id' => $subtitle_id,
                'name' => $validated['name'],
                'image_path' => $path,
            ]);

            return redirect()->back()->with('success', 'Election image uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload election image.');
    }

    public function updateElectionImage(Request $request, $id)
    {
        $electionImage = CandidateImage::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = ['name' => $request->name];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($electionImage->image_path && \Storage::disk('public')->exists($electionImage->image_path)) {
                \Storage::disk('public')->delete($electionImage->image_path);
            }

            // Store new image
            $path = $request->file('image')->store('candidate_images', 'public');
            $data['image_path'] = $path;
        }

        $electionImage->update($data);

        return redirect()->back()->with('success', 'Election image updated successfully.');
    }

    public function deleteElectionImage($id)
    {
        $electionImage = CandidateImage::findOrFail($id);

        // Delete image file
        if ($electionImage->image_path && \Storage::disk('public')->exists($electionImage->image_path)) {
            \Storage::disk('public')->delete($electionImage->image_path);
        }

        $electionImage->delete();

        return redirect()->back()->with('success', 'Election image deleted successfully.');
    }
}
