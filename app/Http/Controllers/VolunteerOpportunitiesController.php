<?php

namespace App\Http\Controllers;

use App\Models\VolunteerOpportunities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VolunteerOpportunitiesController extends Controller
{
    /**
     * Ipakita ang dashboard kasama ang listahan ng volunteer opportunities at statistics.
     * Naka-order nang pataas ang mga ID.
     */
    public function index()
    {
        // Mag-order nang ascending base sa ID para sa dashboard
        $opportunities = VolunteerOpportunities::orderBy('id', 'asc')->paginate(10);
        $totalOpportunities = VolunteerOpportunities::count();

        return view('volunteer-opportunities-db', compact('opportunities', 'totalOpportunities'));
    }

    /**
     * Mag-imbak ng bagong volunteer opportunity sa database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('images', 'public')
            : null;

        VolunteerOpportunities::create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Volunteer Opportunity added successfully.');
    }

    /**
     * I-update ang tinukoy na volunteer opportunity sa database.
     */
    public function update(Request $request, VolunteerOpportunities $opportunity)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($opportunity->image) {
                Storage::disk('public')->delete($opportunity->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $opportunity->update($validated);

        return redirect()->back()->with('success', 'Volunteer Opportunity updated successfully.');
    }

    /**
     * I-delete ang tinukoy na volunteer opportunity mula sa database at i-reorder ang mga ID.
     */
    public function destroy(VolunteerOpportunities $opportunity)
    {
        if ($opportunity->image) {
            Storage::disk('public')->delete($opportunity->image);
        }

        $opportunity->delete();

        // Reorder IDs sa ascending order
        $allOpportunities = VolunteerOpportunities::orderBy('id', 'asc')->get();
        $newId = 1;
        foreach ($allOpportunities as $opp) {
            $opp->id = $newId++;
            $opp->save();
        }

        // Reset AUTO_INCREMENT value
        \DB::statement('ALTER TABLE volunteer_opportunities AUTO_INCREMENT = 1');

        return redirect()->back()->with('success', 'Volunteer Opportunity deleted and IDs reordered successfully.');
    }

    /**
     * Ipakita ang public page kasama ang volunteer opportunities.
     */
    public function showOpportunities()
    {
        // Ipagamit ang 20 items kada pahina at order by descending
        $opportunities = VolunteerOpportunities::orderBy('id', 'desc')->paginate(20);
        return view('volunteer-opportunities', compact('opportunities'));
    }
}
