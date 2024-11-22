<?php


namespace App\Http\Controllers;

use App\Models\GymVideo;
use Illuminate\Http\Request;

class GymVideoController extends Controller
{
    // Show the form to create a new video
    public function create()
    {
        return view('admins.videos.create');
    }

    // Store a new video
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_url' => 'required|url',
        ]);

        // Store the video
        GymVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            // 'coach_id' => auth()->id(), // Assuming you are using authenticated coaches
        ]);

        return redirect()->route('videos.index')->with('success', 'Video created successfully!');
    }

    // Show the form to edit an existing video
    public function edit($id)
    {
        $video = GymVideo::findOrFail($id);
        return view('admins.videos.edit', compact('video'));
    }

    // Update an existing video
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_url' => 'required|url',
        ]);

        $video = GymVideo::findOrFail($id);
        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }

    // Delete a video
    public function destroy($id)
    {
        $video = GymVideo::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
    }

    // Display all videos
    public function index()
    {
        $videos = GymVideo::all(); // You might want to restrict to videos created by the logged-in coach
        return view('admins.videos.index', compact('videos'));
    }
}
