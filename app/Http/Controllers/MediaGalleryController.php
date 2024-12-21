<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryImage;
use App\Models\GalleryAlbum;
use App\Models\GalleryVideo;
use Illuminate\Support\Facades\Storage;

class MediaGalleryController extends Controller
{
    /**
     * Display the dashboard with statistics and lists.
     */
    public function dashboard()
    {
        // Fetch statistics
        $totalImages = GalleryImage::count();
        $recentImages = GalleryImage::latest()->take(5)->count();
        $olderImages = $totalImages - $recentImages;
        $totalAlbums = GalleryAlbum::count();
        $totalVideos = GalleryVideo::count();

        // Fetch paginated data
        $paginatedImages = GalleryImage::orderBy('created_at', 'desc')->paginate(10);
        $albums = GalleryAlbum::all();
        $paginatedAlbums = GalleryAlbum::latest()->paginate(10);
        $paginatedVideos = GalleryVideo::latest()->paginate(10);

        // Pass data to the view
        return view('media_gallery.dashboard', compact(
            'totalImages',
            'recentImages',
            'olderImages',
            'totalAlbums',
            'totalVideos',
            'paginatedImages',
            'albums',
            'paginatedAlbums',
            'paginatedVideos'
        ));
    }

    /**
     * List albums (if needed).
     */
    public function albumsIndex()
    {
        // Redirect to dashboard or handle as needed
        return redirect()->route('media.gallery.dashboard');
    }

    /**
     * Store newly uploaded images.
     */
    public function storeImage(Request $request)
    {
        // Validate the request
        $request->validate([
            'alt_text' => 'nullable|string|max:255',
            'gallery_album_id' => 'nullable|exists:gallery_album,id',
            'images' => 'required|array',
            'images.*' => 'image|max:2048', // Each image max 2MB
        ]);

        // Check if images are uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                // Store each image in the 'public/gallery/images' directory
                $path = $imageFile->store('gallery/images', 'public');

                // Create a new GalleryImage record
                GalleryImage::create([
                    'path' => $path,
                    'alt_text' => $request->alt_text,
                    'gallery_album_id' => $request->gallery_album_id,
                ]);
            }
        }

        // Redirect back with success message
        return back()->with('success', 'Images uploaded successfully.');
    }

    /**
     * Update the specified image.
     */
    public function updateImage(Request $request, GalleryImage $image)
    {
        // Validate the request
        $request->validate([
            'alt_text' => 'nullable|string|max:255',
            'gallery_album_id' => 'nullable|exists:gallery_album,id',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Prepare data for update
        $data = [
            'alt_text' => $request->alt_text,
            'gallery_album_id' => $request->gallery_album_id,
        ];

        // Handle image replacement if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }

            // Store the new image
            $path = $request->file('image')->store('gallery/images', 'public');
            $data['path'] = $path;
        }

        // Update the image record
        $image->update($data);

        // Redirect back with success message
        return back()->with('success', 'Image updated successfully.');
    }

    /**
     * Delete an image.
     */
    public function destroyImage(GalleryImage $image)
    {
        // Delete the image file from storage if it exists
        if (Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }

        // Delete the image record from the database
        $image->delete();

        // Redirect back with success message
        return back()->with('success', 'Image deleted successfully.');
    }

    /**
     * Store a newly created album.
     */
    public function albumsStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new GalleryAlbum record
        GalleryAlbum::create($request->only(['name', 'icon', 'description']));

        // Redirect back with success message
        return back()->with('success', 'Album created successfully.');
    }

    /**
     * Update the specified album.
     */
    public function albumsUpdate(Request $request, GalleryAlbum $album)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update the album record
        $album->update($request->only(['name', 'icon', 'description']));

        // Redirect back with success message
        return back()->with('success', 'Album updated successfully.');
    }

    /**
     * Remove the specified album.
     */
    public function albumsDestroy(GalleryAlbum $album)
    {
        // Optionally, handle related images before deleting the album
        // For example, set 'gallery_album_id' to null for related images
        GalleryImage::where('gallery_album_id', $album->id)->update(['gallery_album_id' => null]);

        // Delete the album record
        $album->delete();

        // Redirect back with success message
        return back()->with('success', 'Album deleted successfully.');
    }

    /**
     * Store a newly created video.
     */
    public function videosStore(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url',
            'video' => 'nullable|mimes:mp4,avi,wmv,mov|max:20480', // Max 20MB
            'gallery_album_id' => 'nullable|exists:gallery_album,id',
            'description' => 'nullable|string',
        ]);

        // Prepare data for creation
        $videoData = [
            'title' => $request->title,
            'url' => $request->url ?? '', // Default to empty string if URL is not provided
            'gallery_album_id' => $request->gallery_album_id,
            'description' => $request->description,
        ];

        // Handle video file upload if provided
        if ($request->hasFile('video')) {
            // Store the video in 'public/gallery/videos' directory
            $path = $request->file('video')->store('gallery/videos', 'public');
            $videoData['path'] = $path; // Save file path in the 'path' column
            $videoData['url'] = null; // Clear URL if video is uploaded
        }

        // Create a new GalleryVideo record
        GalleryVideo::create($videoData);

        // Redirect back with success message
        return back()->with('success', 'Video added successfully.');
    }

    /**
     * Update the specified video.
     */
    public function videosUpdate(Request $request, GalleryVideo $video)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'nullable|url',
            'video' => 'nullable|mimes:mp4,avi,wmv,mov|max:20480', // Max 20MB
            'gallery_album_id' => 'nullable|exists:gallery_album,id',
            'description' => 'nullable|string',
        ]);

        // Prepare data for update
        $videoData = [
            'title' => $request->title,
            'url' => $request->url,
            'gallery_album_id' => $request->gallery_album_id,
            'description' => $request->description,
        ];

        // Handle video file replacement if a new video is uploaded
        if ($request->hasFile('video')) {
            // Delete the old video file if it exists
            if ($video->path && Storage::disk('public')->exists($video->path)) {
                Storage::disk('public')->delete($video->path);
            }

            // Store the new video
            $path = $request->file('video')->store('gallery/videos', 'public');
            $videoData['path'] = $path; // Save new file path
            $videoData['url'] = null; // Clear URL if video is uploaded
        }

        // Update the video record
        $video->update($videoData);

        // Redirect back with success message
        return back()->with('success', 'Video updated successfully.');
    }

    /**
     * Remove the specified video.
     */
    public function videosDestroy(GalleryVideo $video)
    {
        // Delete the video file from storage if it exists
        if ($video->path && Storage::disk('public')->exists($video->path)) {
            Storage::disk('public')->delete($video->path);
        }

        // Delete the video record from the database
        $video->delete();

        // Redirect back with success message
        return back()->with('success', 'Video deleted successfully.');
    }
}
