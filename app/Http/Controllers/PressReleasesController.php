<?php

namespace App\Http\Controllers;

use App\Models\PressReleases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PressReleasesController extends Controller
{
    public function index()
    {
        // Kunin ang press releases sa ascending order ng ID para sa dashboard
        $pressReleases = PressReleases::orderBy('id', 'asc')->paginate(10);
        $totalPressReleases = PressReleases::count();
        $latestPressReleases = PressReleases::where('date', '>=', now()->subMonth())->count();
        $oldPressReleases = $totalPressReleases - $latestPressReleases;

        return view('press-releases-db', compact(
            'pressReleases', 
            'totalPressReleases', 
            'latestPressReleases', 
            'oldPressReleases'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'date'    => 'required|date',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('images', 'public')
            : null;

        PressReleases::create([
            'title'      => $request->title,
            'date'       => $request->date,
            'content'    => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Press Release added successfully.');
    }

    public function update(Request $request, PressReleases $pressRelease)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'date'    => 'required|date',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($pressRelease->image_path) {
                Storage::disk('public')->delete($pressRelease->image_path);
            }
            $pressRelease->image_path = $request->file('image')->store('images', 'public');
        }

        $pressRelease->update([
            'title'      => $request->title,
            'date'       => $request->date,
            'content'    => $request->content,
            'image_path' => $pressRelease->image_path,
        ]);

        return redirect()->back()->with('success', 'Press Release updated successfully.');
    }

    public function destroy(PressReleases $pressRelease)
    {
        if ($pressRelease->image_path) {
            Storage::disk('public')->delete($pressRelease->image_path);
        }
        $pressRelease->delete();

        // Reorder IDs sa ascending order
        $allPressReleases = PressReleases::orderBy('id', 'asc')->get();
        $newId = 1;
        foreach ($allPressReleases as $pr) {
            $pr->id = $newId++;
            $pr->save();
        }

        // Reset AUTO_INCREMENT value
        \DB::statement('ALTER TABLE press_releases AUTO_INCREMENT = 1');

        return redirect()->back()->with('success', 'Press Release deleted and IDs reordered successfully.');
    }
}
