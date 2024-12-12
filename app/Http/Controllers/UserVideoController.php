<?php

namespace App\Http\Controllers;

use App\Models\GymVideo;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VideoBenefit;

class UserVideoController extends Controller
{
    public function index()
    {
        // Fetch only free videos (videos not associated with "Premium Video Content")
        $videos = GymVideo::whereDoesntHave('videoBenefits', function ($query) {
            $query->where('benefit', 'Premium');
        })->get();
    
        return view('users.videos.index', compact('videos'));
    }
    
    public function premiumContent()
{
    // Check if the user has an active subscription
    $subscription = Subscription::where('user_id', Auth::id())
        ->where('status', 'active')
        ->first();

    if (!$subscription) {
        return redirect()->route('users.videos.index')->with('error', 'No active subscription found.');
    }

    // Decode the benefits JSON column
    $benefits = json_decode($subscription->benefits, true);

    // Debugging step: Log the benefits for verification
    \Log::info('User subscription benefits: ', ['benefits' => $benefits]);

    // Check if "Premium Video Content" is in the benefits array
    if (!in_array('Premium Video Content', $benefits)) {
        return redirect()->route('users.videos.index')->with('error', 'You do not have access to premium content.');
    }

    // Fetch premium videos
    $premiumVideos = GymVideo::whereHas('videoBenefits', function ($query) {
        $query->where('benefit', 'Premium');
    })->get();

    // Render the premium videos view
    return view('users.videos.premium', compact('premiumVideos'));
}

    
}    