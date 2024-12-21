<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicResource;
use Illuminate\Support\Facades\Validator;

class AcademicResourcesController extends Controller
{
    /**
     * Display a listing of the Academic Resources.
     * Handles both admin dashboard (paginated) and user-facing calendar.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $events = AcademicResource::orderBy('event_date', 'asc')->get();

            $eventsByMonth = $events->groupBy(function ($event) {
                return $event->event_date->format('F');
            })->map(function ($events) {
                return $events->map(function ($event) {
                    return [
                        'title' => $event->title,
                        'date' => $event->event_date->format('l, F j, Y'),
                        'description' => $event->description,
                    ];
                });
            });

            return response()->json($eventsByMonth);
        }

        $events = AcademicResource::orderBy('created_at', 'asc')->paginate(10);

        return view('academic-resources.index', compact('events'));
    }

    /**
     * Store a newly created Academic Resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        AcademicResource::create($request->only(['title', 'event_date', 'description']));

        return redirect()->back()->with('success', 'Event added successfully.');
    }

    /**
     * Update the specified Academic Resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcademicResource  $academicResource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, AcademicResource $academicResource)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $academicResource->update($request->only(['title', 'event_date', 'description']));

        return redirect()->back()->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified Academic Resource from storage.
     *
     * @param  \App\Models\AcademicResource  $academicResource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AcademicResource $academicResource)
    {
        $academicResource->delete();

        return redirect()->back()->with('success', 'Event deleted successfully.');
    }
}
