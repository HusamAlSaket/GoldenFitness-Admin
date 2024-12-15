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
        // Initialize $premiumVideos as an empty collection
        $premiumVideos = collect();
    
        // Check if the user has an active subscription
        $subscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();
    
        // Check if the subscription exists
        if (!$subscription) {
            // No subscription found, show SweetAlert
            return view('users.videos.premium', compact('premiumVideos'))->with('sweet_alert', [
                'type' => 'error',
                'message' => 'Access Denied! Please subscribe to the yearly plan to get these benefits.'
            ]);
        }
    
        // Decode the benefits JSON column
        $benefits = json_decode($subscription->benefits, true);
    
        // Check if "Premium Video Content" is in the benefits array (case-insensitive)
        $premiumContentAccess = in_array('Premium Video Content', $benefits);
    
        if (!$premiumContentAccess) {
            // Premium Video Content is not in benefits, show SweetAlert
            return view('users.videos.premium', compact('premiumVideos'))->with('sweet_alert', [
                'type' => 'error',
                'message' => 'Premium Video Content not included in your subscription plan.'
            ]);
        }
    
        // Fetch premium videos if the user has access
        $premiumVideos = GymVideo::whereHas('videoBenefits', function ($query) {
            $query->where('benefit', 'Premium');
        })->get();
    
        // Render the premium videos view
        return view('users.videos.premium', compact('premiumVideos'));
    }
    

    
    
    
}    