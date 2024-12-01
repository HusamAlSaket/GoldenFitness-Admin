<?php

namespace App\Http\Controllers;

use App\Models\GymVideo;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserVideoController extends Controller
{
    public function index()
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first(); 
    
        $benefits = $subscription ? json_decode($subscription->benefits, true) : [];
    
        $canViewPremium = in_array('Premium Video Content', $benefits);
    
        $videos = GymVideo::with('benefits')->get();
    
        if (!$canViewPremium) {
            $videos = $videos->filter(function ($video) {
                return !$video->benefits->contains('benefit', 'Premium Video Content');
            });
        }
    
        return view('users.videos.index', compact('videos'));
    }
    
    public function premiumContent()
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first(); 
    
        $benefits = $subscription ? json_decode($subscription->benefits, true) : [];
    
        if (!in_array('Premium Video Content', $benefits)) {
            return redirect()->route('user.subscriptions.index')->with('error', 'You do not have access to premium content.');
        }
    
        $premiumVideos = GymVideo::whereHas('benefits', function ($query) {
            $query->where('benefit', 'Premium Video Content');
        })->get();
    
        return view('users.videos.premium', compact('premiumVideos'));
    }
}    