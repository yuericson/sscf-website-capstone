<?php

namespace App\Http\Controllers;

use App\Models\LatestNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LatestNewsController extends Controller
{
    /**
     * Display the dashboard with paginated latest news and statistics.
     */
    public function index()
    {
        $latestNews = LatestNews::orderBy('id')->paginate(10); // Order by ID for consistent display
        $totalNews = LatestNews::count();
        $latest = LatestNews::where('date', '>=', now()->subMonth())->count();
        $oldNews = $totalNews - $latest;

        return view('latest-news-db', compact('latestNews', 'totalNews', 'latest', 'oldNews'));
    }

    /**
     * Store a newly created news item in the database.
     */
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

        LatestNews::create([
            'title'      => $request->title,
            'date'       => $request->date,
            'content'    => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'News added successfully.');
    }

    /**
     * Update the specified news item in the database.
     */
    public function update(Request $request, LatestNews $latestNews)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'date'    => 'required|date',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($latestNews->image_path) {
                Storage::disk('public')->delete($latestNews->image_path);
            }
            $latestNews->image_path = $request->file('image')->store('images', 'public');
        }
        
        $latestNews->update([
            'title'   => $request->title,
            'date'    => $request->date,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified news item from the database and reorder IDs.
     */
    public function destroy(LatestNews $latestNews)
    {
        // Delete the news item
        if ($latestNews->image_path) {
            Storage::disk('public')->delete($latestNews->image_path);
        }
        $latestNews->delete();

        // Reorder IDs
        $allNews = LatestNews::orderBy('id')->get(); // Get all records in order
        $id = 1;
        foreach ($allNews as $news) {
            $news->id = $id++;
            $news->save();
        }

        // Reset AUTO_INCREMENT
        \DB::statement('ALTER TABLE latest_news AUTO_INCREMENT = 1');

        return redirect()->back()->with('success', 'News deleted and IDs reordered successfully.');
    }

    /**
     * Display the homepage with recent news.
     */
    public function homepage()
    {
        $recentNews = LatestNews::orderBy('date', 'desc')->paginate(4);
        return view('index', compact('recentNews'));
    }

    /**
     * Display the latest news page with paginated news items.
     */
    public function latestNewsPage()
    {
        $latestNews = LatestNews::orderBy('id')->paginate(6);
        return view('latest-news', compact('latestNews'));
    }

    /**
     * Display the detailed view of a specific news item.
     */
    public function show(LatestNews $latestNews)
    {
        return view('news-detail', compact('latestNews'));
    }
}
