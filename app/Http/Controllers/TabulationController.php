<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Judge;
use App\Models\Pageant;
use App\Models\Criteria;
use App\Models\Participant;
use App\Models\Score;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TabulationController extends Controller
{

    /**
 * Approve a specific pageant.
 *
 * @param  \App\Models\Pageant  $pageant
 * @return \Illuminate\Http\RedirectResponse
 */
public function approve(Pageant $pageant)
{
    $pageant->status = 'approved';
    $pageant->save();

    return redirect()->back()->with('success', 'Pageant approved successfully.');
}

/**
 * Deny a specific pageant.
 *
 * @param  \App\Models\Pageant  $pageant
 * @return \Illuminate\Http\RedirectResponse
 */
public function deny(Pageant $pageant)
{
    $pageant->status = 'denied';
    $pageant->save();

    return redirect()->back()->with('success', 'Pageant denied successfully.');
}


    /**
     * Update a specific pageant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pageant  $pageant
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pageant $pageant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'status' => 'required|in:pending,approved,denied',
        ]);

        $pageant->update($validated);

        return redirect()->back()->with('success', 'Pageant updated successfully.');
    }

    /**
     * Delete a specific pageant.
     *
     * @param  \App\Models\Pageant  $pageant
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pageant $pageant)
    {
        // Authorization check
        $this->authorize('delete', $pageant);

        $pageant->delete();

        return redirect()->back()->with('success', 'Pageant deleted successfully.');
    }

    /**
     * View the final results of a pageant.
     *
     * @param  \App\Models\Pageant  $pageant
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function viewResults(Pageant $pageant)
    {
        if ($pageant->status !== 'approved') {
            return redirect()->back()->with('error', 'Final results are not available for this pageant.');
        }

        // Fetch necessary data for final results
        // Example: $results = $pageant->results()->with('category', 'judge')->get();

        return view('final-results', compact('pageant'));
    }
    /**
     * Display the landing page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tabulation');
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('tabulation-login');
    }

    /**
     * Handle login submissions.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $judge = Judge::where('username', $credentials['username'])->first();

        if ($judge && Hash::check($credentials['password'], $judge->password)) {
            // Set judge ID in session
            session(['judge_id' => $judge->id]);
            return redirect()->route('tabulationform')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['Invalid credentials.']);
    }

    /**
     * Handle logout.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $request->session()->forget('judge_id');
        return redirect()->route('tabulation-login')->with('success', 'Logged out successfully.');
    }

    /**
     * Display the tabulation form for the assigned pageants.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function form()
    {
        if (!session()->has('judge_id')) {
            return redirect()->route('tabulation-login')->withErrors(['You must be logged in to access the form.']);
        }

        $judge = Judge::with('pageants.categories.criteria', 'pageants.participants')->find(session('judge_id'));

        if (!$judge) {
            return redirect()->route('tabulation-login')->withErrors(['Judge not found.']);
        }

        $pageants = $judge->pageants;

        return view('tabulation-form', compact('judge', 'pageants'));
    }

    /**
     * Display the dashboard with statistics and judge assignments.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function dashboard()
    {
        if (!session()->has('judge_id')) {
            return redirect()->route('tabulation-login')->withErrors(['You must be logged in to access the dashboard.']);
        }

        // Retrieve statistics
        $totalJudges = Judge::count();
        $totalPageants = Pageant::count();
        $totalCriteria = Criteria::count();
        $totalParticipants = Participant::count();
        $totalCategories = Category::count();

        // Fetch judges with their assigned pageants and paginate the results
        $judges = Judge::with('pageants')->orderBy('id')->paginate(10);

        // Fetch all pageants with their assigned judges
        $pageants = Pageant::with('judges')->get();

        // Fetch all categories with their associated pageants and criteria
        $categories = Category::with(['pageant', 'criteria'])->get();

        // Fetch all participants with their associated pageants
        $participants = Participant::with('pageant')->get();

        return view('tabulation-db', compact(
            'totalJudges',
            'totalPageants',
            'totalCriteria',
            'totalParticipants',
            'totalCategories',
            'judges',
            'pageants',
            'categories',
            'participants'
        ));
    }

    /**
     * Assign pageants to a judge.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $judge_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignJudgeToPageant(Request $request, $judge_id)
    {
        $request->validate([
            'pageant_ids' => 'required|array',
            'pageant_ids.*' => 'exists:pageants,id',
        ]);

        $judge = Judge::findOrFail($judge_id);
        $judge->pageants()->sync($request->pageant_ids);

        return redirect()->back()->with('success', 'Judge assignments updated successfully.');
    }

    /**
     * Remove a judge from a specific pageant.
     *
     * @param int $judge_id
     * @param int $pageant_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeJudgeFromPageant($judge_id, $pageant_id)
    {
        $judge = Judge::findOrFail($judge_id);
        $judge->pageants()->detach($pageant_id);

        return redirect()->back()->with('success', 'Judge removed from the pageant successfully.');
    }

    /**
     * Judge Management Methods
     */

    /**
     * Add a new judge.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addJudge(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:judges,username',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:judges,email',
            'password' => 'required|min:6',
        ]);

        Judge::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Judge added successfully.');
    }

    /**
     * Edit an existing judge.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editJudge(Request $request, $id)
    {
        $judge = Judge::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:judges,username,' . $judge->id,
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:judges,email,' . $judge->id,
        ]);

        $judge->update($request->only(['username', 'name', 'email']));

        return redirect()->back()->with('success', 'Judge details updated successfully.');
    }

    /**
     * Delete a judge.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteJudge($id)
    {
        $judge = Judge::findOrFail($id);

        // Detach all pageant assignments
        $judge->pageants()->detach();

        // Delete all scores associated with the judge
        $judge->scores()->delete();

        // Delete the judge
        $judge->delete();

        return redirect()->back()->with('success', 'Judge deleted successfully.');
    }

    /**
     * Category Management Methods
     */

    /**
     * Add a new category.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCategory(Request $request)
    {
        $request->validate([
            'pageant_id' => 'required|exists:pageants,id',
            'name'       => 'required|string|max:255',
        ]);

        Category::create([
            'pageant_id' => $request->pageant_id,
            'name'       => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category added successfully.');
    }

    /**
     * Edit an existing category.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Category updated successfully.');
    }

    /**
     * Delete a category.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCategory($id)
    {
        $category = Category::with('criteria')->findOrFail($id);

        // Check for associated criteria
        if ($category->criteria()->count() > 0) {
            return redirect()->back()->withErrors(['Cannot delete a category with associated criteria.']);
        }

        // Delete the category
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    /**
     * Pageant Management Methods
     */
  /**public function finishTabulation(Request $request)
{
    $pageantId = $request->pageant_id;
    // If it’s per pageant or per judge-pageant pivot
    $pageant = Pageant::findOrFail($pageantId);
    $pageant->locked = true;
    $pageant->save();

    return redirect()->back()->with('success', 'Tabulation locked successfully.');
}
    
    /**
     * Add a new pageant.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addPageant(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:pageants,name',
            'gender'      => 'required|in:male,female,both',
            'description' => 'nullable|string',
            'date'        => 'required|date',
        ]);

        Pageant::create([
            'name'        => $request->name,
            'gender'      => $request->gender,
            'description' => $request->description,
            'date'        => $request->date,
        ]);

        return redirect()->back()->with('success', 'Pageant added successfully.');
    }

    /**
     * Edit an existing pageant.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPageant(Request $request, $id)
    {
        $pageant = Pageant::findOrFail($id);

        $request->validate([
            'name'        => 'required|unique:pageants,name,' . $pageant->id,
            'gender'      => 'required|in:male,female,both',
            'description' => 'nullable|string',
            'date'        => 'required|date',
        ]);

        $pageant->update($request->only(['name', 'gender', 'description', 'date']));

        return redirect()->back()->with('success', 'Pageant updated successfully.');
    }

    /**
     * Delete a pageant.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePageant($id)
    {
        $pageant = Pageant::with(['categories', 'participants', 'judges'])->findOrFail($id);

        // Check for related categories or participants
        if ($pageant->categories()->count() > 0 || $pageant->participants()->count() > 0) {
            return redirect()->back()->withErrors(['Cannot delete a pageant with associated categories or participants.']);
        }

        // Detach all judges assigned to the pageant
        $pageant->judges()->detach();

        // Delete the pageant
        $pageant->delete();

        return redirect()->back()->with('success', 'Pageant deleted successfully.');
    }

    /**
     * Criteria Management Methods
     */

    /**
     * Add new criteria to a specific pageant and category.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $pageant_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCriteria(Request $request, $pageant_id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:criterias,name,NULL,id,category_id,' . $request->category_id,
            'weight' => 'required|numeric|min:0|max:100',
        ]);
    
        // If validation passes, create the new criteria
        Criteria::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'weight' => $request->weight,
        ]);
    
        return redirect()->back()->with('success', 'Criteria added successfully!');
    }
    
    /**
     * Edit an existing criteria.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editCriteria(Request $request, $id)
    {
        $criteria = Criteria::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'weight' => 'required|numeric|min:0|max:100',
        ]);

        // Calculate total weight within the category after updating
        $category = $criteria->category;
        $totalWeight = $category->criteria()->where('id', '!=', $criteria->id)->sum('weight') + $request->weight;
        if ($totalWeight > 100) {
            return redirect()->back()->withErrors(['Total weight of criteria in this category exceeds 100%.']);
        }

        $criteria->update($request->only(['name', 'weight']));

        return redirect()->back()->with('success', 'Criteria updated successfully.');
    }

    /**
     * Delete a criteria.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCriteria($id)
    {
        $criteria = Criteria::with('scores')->findOrFail($id);

        // Delete associated scores
        if ($criteria->scores()->count() > 0) {
            $criteria->scores()->delete();
        }

        // Delete the criteria
        $criteria->delete();

        return redirect()->back()->with('success', 'Criteria deleted successfully.');
    }

    /**
     * Participant Management Methods
     */

    /**
     * Add a new participant to a specific pageant.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $pageant_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addParticipant(Request $request, $pageant_id)
    {
        $pageant = Pageant::findOrFail($pageant_id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'gender' => 'required|in:male,female',
        ]);

        Participant::create([
            'pageant_id' => $pageant_id,
            'name'       => $request->name,
            'gender'     => $request->gender,
        ]);

        return redirect()->back()->with('success', 'Participant added successfully.');
    }

    /**
     * Edit an existing participant.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editParticipant(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'gender' => 'required|in:male,female',
        ]);

        $participant->update($request->only(['name', 'gender']));

        return redirect()->back()->with('success', 'Participant updated successfully.');
    }

    /**
     * Delete a participant.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteParticipant($id)
    {
        $participant = Participant::with('scores')->findOrFail($id);

        // Delete associated scores
        if ($participant->scores()->count() > 0) {
            $participant->scores()->delete();
        }

        // Delete the participant
        $participant->delete();

        return redirect()->back()->with('success', 'Participant deleted successfully.');
    }

    /**
     * Submit Scores Method
     *
     * Handles the submission of scores by judges.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitScores(Request $request)
{
    $judge_id = session('judge_id');
    if (!$judge_id) {
        return redirect()->route('tabulation-login')
            ->withErrors(['You must be logged in to submit scores.']);
    }

    // Validate the incoming request
    $validated = $request->validate([
        'pageant_id' => 'required|exists:pageants,id',
        'scores'     => 'required|array',
        'scores.*.*' => 'required|numeric|min:0|max:100', 
        // If you also pass category_id from your form, you might do:
        // 'category_id' => 'required|exists:categories,id'
    ]);

    $judge = Judge::findOrFail($judge_id);
    if (!$judge->pageants->contains($validated['pageant_id'])) {
        return redirect()->back()
            ->withErrors(['You are not assigned to this pageant.']);
    }

    $pageant_id = $validated['pageant_id'];
    $scores     = $validated['scores'];

    // We'll track the first category we encounter (assuming one category per submission)
    $firstCategory = null;

    foreach ($scores as $participant_id => $criteria_scores) {
        foreach ($criteria_scores as $criteria_id => $score_value) {
            // Find the Criteria, ensuring it belongs to this pageant (via its Category)
            $criteria = Criteria::where('id', $criteria_id)
                                ->whereHas('category', function($query) use ($pageant_id) {
                                    $query->where('pageant_id', $pageant_id);
                                })
                                ->first();

            if (!$criteria) {
                return redirect()->back()
                    ->withErrors(['Invalid criteria selected.']);
            }

            // Ensure score does not exceed the criterion's weight
            if ($score_value > $criteria->weight) {
                return redirect()->back()
                    ->withErrors(['Score for ' . $criteria->name . ' exceeds its weight.']);
            }

            // Save or update the score
            Score::updateOrCreate(
                [
                    'judge_id'       => $judge_id,
                    'participant_id' => $participant_id,
                    'criteria_id'    => $criteria_id,
                ],
                [
                    'score' => $score_value,
                ]
            );

            // Capture the first category we find
            if (!$firstCategory) {
                $firstCategory = $criteria->category;
            } else {
                // (Optional) Confirm that all Criteria in this submission belong to the same Category
                if ($firstCategory->id !== $criteria->category_id) {
                    return redirect()->back()->withErrors([
                        'All scores in one submission must belong to the same category.'
                    ]);
                }
            }
        }
    }

    // After all scores are saved, lock this category (if found)
    if ($firstCategory) {
        $firstCategory->locked = true;
        $firstCategory->save();
    }

    return redirect()->back()->with('success', 'Scores submitted and this category is now locked.');
}


    /**
     * Final Results Method
     *
     * Calculates and displays the final results based on scores and categories.
     *
     * @param int $pageant_id
     * @return \Illuminate\View\View
     */
    public function finalResults($pageant_id)
    {
        $pageant = Pageant::with(['categories.criteria', 'participants.scores.criteria'])->findOrFail($pageant_id);
        $participants = $pageant->participants;

        $results = [];

        foreach ($participants as $participant) {
            $scores = $participant->scores->where('criteria.category.pageant_id', $pageant_id);
            $total_score = 0;

            foreach ($pageant->categories as $category) {
                $category_total = 0;
                foreach ($category->criteria as $criterion) {
                    $score = $scores->where('criteria_id', $criterion->id)->first();
                    if ($score) {
                        $weighted = ($score->score * $criterion->weight) / 100;
                        $category_total += $weighted;
                    }
                }
                $total_score += $category_total;
            }

            $results[] = [
                'id'          => $participant->id,
                'name'        => $participant->name,
                'total_score' => $total_score,
            ];
        }

        // Sort participants by total_score descending
        usort($results, fn($a, $b) => $b['total_score'] <=> $a['total_score']);

        // Assign overall ranks
        foreach ($results as $index => &$result) {
            $result['rank'] = $index + 1;
        }

        // Calculate category-wise results
        $categoryResults = [];

        foreach ($pageant->categories as $category) {
            $catResults = [];

            foreach ($results as $participantResult) {
                $participant = $pageant->participants->find($participantResult['id']);
                if ($participant) {
                    $category_total = 0;
                    $scores = $participant->scores->where('criteria.category_id', $category->id)->keyBy('criteria_id');

                    foreach ($category->criteria as $criterion) {
                        if (isset($scores[$criterion->id])) {
                            $category_total += ($scores[$criterion->id]->score * $criterion->weight) / 100;
                        }
                    }

                    $catResults[] = [
                        'name'           => $participant->name,
                        'scores'         => $scores,
                        'category_total' => $category_total,
                    ];
                }
            }

            // Sort category-wise results
            usort($catResults, fn($a, $b) => $b['category_total'] <=> $a['category_total']);

            // Assign category ranks
            foreach ($catResults as $index => &$catResult) {
                $catResult['rank'] = $index + 1;
            }

            $categoryResults[$category->id] = [
                'category_name' => $category->name,
                'results'       => $catResults,
                'criteria'      => $category->criteria,
            ];
        }

        return view('final-results', compact('pageant', 'results', 'categoryResults'));
    }

    /**
     * User Final Results Method
     *
     * Displays final results to users (public view).
     *
     * @param int $pageant_id
     * @return \Illuminate\View\View
     */
    public function userFinalResults($pageant_id)
    {
        $pageant = Pageant::with(['categories.criteria', 'participants.scores.criteria'])->findOrFail($pageant_id);
        $participants = $pageant->participants;

        $results = [];

        foreach ($participants as $participant) {
            $scores = $participant->scores()->with('criteria.category')->get();
            $total_score = 0;

            foreach ($pageant->categories as $category) {
                $category_total = 0;
                foreach ($category->criteria as $criterion) {
                    $score = $scores->where('criteria_id', $criterion->id)->first();
                    if ($score) {
                        $weighted = ($score->score * $criterion->weight) / 100;
                        $category_total += $weighted;
                    }
                }
                $total_score += $category_total;
            }

            $results[] = [
                'id'          => $participant->id,
                'name'        => $participant->name,
                'total_score' => $total_score,
            ];
        }

        // Sort participants by total_score descending
        usort($results, fn($a, $b) => $b['total_score'] <=> $a['total_score']);

        // Assign ranks
        foreach ($results as $index => &$result) {
            $result['rank'] = $index + 1;
        }

        return view('user-final-results', compact('pageant', 'results'));
    }

    /**
     * API Endpoint to get pageant details.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPageantDetails($id)
{
    try {
        // Validate if the pageant exists
        $pageant = Pageant::findOrFail($id);

        // Fetch categories linked to this pageant
        $categories = Category::where('pageant_id', $id)->get(['id', 'name']);

        return response()->json(['categories' => $categories]);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error fetching categories: ' . $e->getMessage());

        return response()->json(['error' => 'Unable to fetch categories'], 500);
    }

    
}

}
