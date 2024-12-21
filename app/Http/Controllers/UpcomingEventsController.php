<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpcomingEvent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UpcomingEventsController extends Controller
{
    /**
     * Display the dashboard with statistics and all events.
     */
    public function index()
    {
        $events = UpcomingEvent::orderBy('id', 'asc')->paginate(10);
        $totalEvents = UpcomingEvent::count();
        $latestEvents = UpcomingEvent::orderBy('created_at', 'desc')->take(5)->count();
        $oldEvents = max(0, $totalEvents - $latestEvents);

        return view('upcoming-events-db', compact('events', 'totalEvents', 'latestEvents', 'oldEvents'));
    }

    /**
     * Store a new event in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'image|mimes:jpeg,png,jpg,gif|max:2048', // optional image
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('upcoming_events_images', 'public');
        }

        UpcomingEvent::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Event added successfully!');
    }

    /**
     * Show the edit form for a specific event.
     */
    public function edit($id)
    {
        $event = UpcomingEvent::findOrFail($id);
        return view('edit_event', compact('event'));
    }

    /**
     * Update a specific event in the database.
     */
    public function update(Request $request, $id)
    {
        $event = UpcomingEvent::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $imagePath = $request->file('image')->store('upcoming_events_images', 'public');
            $event->image = $imagePath;
        }

        $event->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $event->image,
        ]);

        return redirect()->back()->with('success', 'Event updated successfully!');
    }

    /**
     * Delete a specific event and re-sequence IDs.
     */
    public function destroy($id)
    {
        $event = UpcomingEvent::findOrFail($id);

        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        // Re-sequence the IDs
        $events = UpcomingEvent::orderBy('id')->get();
        $newId = 1;
        foreach ($events as $event) {
            $event->id = $newId++;
            $event->save();
        }

        // Reset the auto-increment value
        $maxId = UpcomingEvent::max('id') ?? 0;
        DB::statement("ALTER TABLE upcoming_events AUTO_INCREMENT = " . ($maxId + 1));

        return redirect()->back()->with('success', 'Event deleted and IDs re-sequenced successfully!');
    }

    /**
     * Fetch latest images for Upcoming Events Carousel (optional).
     */
    public function getLatestImages()
    {
        $images = UpcomingEvent::whereNotNull('image')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(['image']);

        return response()->json($images);
    }
}
