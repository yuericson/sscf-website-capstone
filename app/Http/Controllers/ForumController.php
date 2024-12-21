<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ForumPost;
use App\Models\Comment;
use App\Models\Reaction;

class ForumController extends Controller
{
    // Display the landing page of the forum
    public function index()
    {
        return view('forum');
    }

    // Display Forum Posts
    public function showPosts()
    {
        if (!Auth::check()) {
            return redirect()->route('login.google')->with('error', 'Please log in to access the forum.');
        }

        $posts = ForumPost::where('status', 'approved')
            ->with(['comments.user', 'reactions', 'user'])
            ->latest()
            ->paginate(20); // Paginate 20 posts per page

        return view('forum-post', [
            'posts' => $posts,
            'user' => Auth::user(), // Pass the authenticated user to the view
        ]);
    }

    // Submit a New Post
    public function submitPost(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login.google')->with('error', 'Please log in to submit a post.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        ForumPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => 'pending', // New posts require approval
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Post submitted successfully and is pending approval.');
    }

    // React to a Post
    public function react(Request $request, $postId)
    {
        if (!Auth::check()) {
            return redirect()->route('login.google')->with('error', 'Please log in to react to a post.');
        }

        $request->validate([
            'type' => 'required|in:like,unlike',
        ]);

        $post = ForumPost::findOrFail($postId);

        $existingReaction = Reaction::where('forum_post_id', $post->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReaction) {
            if ($existingReaction->type === $request->type) {
                $existingReaction->delete(); // Remove reaction if same type is clicked again
                return redirect()->back()->with('success', ucfirst($request->type) . ' removed.');
            } else {
                $existingReaction->update(['type' => $request->type]); // Update reaction type
                return redirect()->back()->with('success', ucfirst($request->type) . ' added.');
            }
        } else {
            Reaction::create([
                'forum_post_id' => $post->id,
                'type' => $request->type,
                'user_id' => Auth::id(),
            ]);
            return redirect()->back()->with('success', ucfirst($request->type) . ' added.');
        }
    }

    // Add Comment to a Post
    // Add Comment to a Post
    public function addComment(Request $request, $postId)
    {
        if (!Auth::check()) {
            return redirect()->route('login.google')->with('error', 'Please log in to add a comment.');
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        $post = ForumPost::findOrFail($postId);

        Comment::create([
            'forum_post_id' => $post->id,
            'content' => filter_profanity($request->content),
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    // Admin Dashboard
    public function adminDashboard()
    {
        $posts = ForumPost::with(['comments.user', 'reactions', 'user'])->latest()->get();
        return view('admin.forum-db', compact('posts'));
    }

    // Approve a Post
    public function approvePost($postId)
    {
        $post = ForumPost::findOrFail($postId);
        $post->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Post approved successfully.');
    }

    // Deny a Post
    public function denyPost($postId)
    {
        $post = ForumPost::findOrFail($postId);
        $post->update(['status' => 'denied']);
        return redirect()->back()->with('success', 'Post denied successfully.');
    }

    // Delete a Post
    public function deletePost($postId)
    {
        $post = ForumPost::findOrFail($postId);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
