<?php


namespace App\Http\Controllers;

use App\Models\GymVideo;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Step 1: Validate the data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_url' => 'required|url',
            'benefit' => 'nullable|string', // Benefit is now a string that will be split later
        ]);
    
        // Step 2: Store the video in the gym_videos table
        $video = GymVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'coach_id' => Auth::id(), // Assuming you're using the authenticated user as coach
        ]);
    
        // Step 3: Handle multiple benefits
        if ($request->benefit) {
            // Split the benefits into an array
            $benefits = explode(',', $request->benefit);
    
            // Trim any excess whitespace around the benefit names
            $benefits = array_map('trim', $benefits);
    
            // Store each benefit related to this video
            foreach ($benefits as $benefit) {
                $video->benefits()->create([
                    'benefit' => $benefit,
                ]);
            }
        }
    
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
        // Step 1: Validate the data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_url' => 'required|url',
            'benefit' => 'nullable|string', // Benefit is now a string that will be split later
        ]);
    
        // Step 2: Find the video to update
        $video = GymVideo::findOrFail($id);
    
        // Step 3: Update the video data
        $video->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            
        ]);
    
        if ($request->benefit) {
            // Split the benefits into an array
            $benefits = explode(',', $request->benefit);
    
            // Trim any excess whitespace around the benefit names
            $benefits = array_map('trim', $benefits);
    
            // Store each benefit related to this video
            foreach ($benefits as $benefit) {
                $video->benefits()->create([
                    'benefit' => $benefit,
                ]);
            }
        }
    
    
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
        // Get the subscription benefits for the logged-in admin (if necessary)
        $subscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();

        $benefits = $subscription ? json_decode($subscription->benefits, true) : [];
        $canViewPremium = in_array('Premium Video Content', $benefits);

        // Fetch all gym videos
        $videos = GymVideo::all();

        // Filter videos based on the subscription benefits (only exclude premium if no access)
        if (!$canViewPremium) {
            $videos = $videos->filter(function ($video) {
                return !$video->benefits->contains('benefit', 'Premium Video Content');
            });
        }

        return view('admins.videos.index', compact('videos'));
    }
}

