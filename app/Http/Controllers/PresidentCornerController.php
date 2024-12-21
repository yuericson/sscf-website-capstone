<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\PresidentCorner;

class PresidentCornerController extends Controller
{
    /**
     * Display the dashboard with statistics and all posts.
     */
    public function updateStatistics()
    {
        // Fetch statistics
        $totalPosts = PresidentCorner::count();
        $latestPosts = PresidentCorner::orderBy('created_at', 'desc')->take(5)->count();
        $oldPosts = max(0, $totalPosts - $latestPosts);
        $posts = PresidentCorner::orderBy('id', 'asc')->paginate(10);

        return redirect()->back()->with([
            'totalPosts' => $totalPosts,
            'latestPosts' => $latestPosts,
            'oldPosts' => $oldPosts,
            'posts'  => $posts,
        ]);
    }

   

    /**
     * Store a new post in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store image
        $imagePath = $request->file('image')->store('president_corner_images', 'public');

        // Create a new post
        PresidentCorner::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Post added successfully!');
    }

    /**
     * Show the edit form for a specific post.
     */
    public function edit($id)
    {
        $post = PresidentCorner::findOrFail($id);
        return view('edit_post', compact('post'));
    }

    /**
     * Update a specific post in the database.
     */
    public function update(Request $request, $id)
    {
        $post = PresidentCorner::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image update if provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('president_corner_images', 'public');
            $post->image = $imagePath;
        }

        // Update post details
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $post->image,
        ]);

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    /**
     * Delete a specific post from the database and re-sequence IDs.
     */
    public function destroy($id)
    {
        $post = PresidentCorner::findOrFail($id);

        // Delete the image file if it exists
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete the post
        $post->delete();

        // Re-sequence the IDs
        $posts = PresidentCorner::orderBy('id')->get();
        $newId = 1;
        foreach ($posts as $post) {
            $post->id = $newId++;
            $post->save();
        }

        // Reset the auto-increment value
        $maxId = PresidentCorner::max('id') ?? 0;
        DB::statement("ALTER TABLE president_corners AUTO_INCREMENT = " . ($maxId + 1));

        return redirect()->back()->with('success', 'Post deleted and IDs re-sequenced successfully!');
    }
    /**
     * Fetch latest images for the President's Message Carousel.
     * This can be used via AJAX if needed.
     */
    public function getLatestImages()
    {
        $images = PresidentCorner::whereNotNull('image')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get(['image']);

        return response()->json($images);
    }
}
