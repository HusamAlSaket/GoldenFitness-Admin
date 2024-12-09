<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSubscriptionController extends Controller
{


    // public function index()
    // {
    //     $subscriptions = Subscription::where('user_id', Auth::id())->get();
    //     return view('users.subscriptions.index', compact('subscriptions'));
    // }

    public function show($id)
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->findOrFail($id);
        return view('users.subscriptions.show', compact('subscription'));
    }

    public function create()
    {
        $benefits = [
            'Weekly' => ['Gym Access'],
            'Monthly' => ['Gym Access', 'Sauna Access', 'Jacuzzi Access', 'In-body Test'],
            'Yearly' => ['Gym Access', 'Sauna Access', 'Jacuzzi Access', 'In-body Test', 'Blogs', 'Premium Video Content'],
        ];
    
        // Check if the user has an active subscription
        $activeSubscription = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();
    
        return view('users.subscriptions.create', compact('benefits', 'activeSubscription'));
    }
    public function cancel($id)
{
    $subscription = Subscription::where('user_id', Auth::id())->findOrFail($id);

    if ($subscription->status !== 'active') {
        return redirect()->route('user.subscriptions.index')->with('error', 'This subscription is already canceled.');
    }

    $subscription->update(['status' => 'expired', 'end_date' => now()]);

    return redirect()->route('user.subscriptions.create')
        ->with('success', 'Subscription canceled successfully.');
}


public function store(Request $request)
{
    $request->validate([
        'subscription_type' => 'required|in:Weekly,Monthly,Yearly',
    ]);

    $userId = Auth::id();

    // Ensure the user is authenticated
    if (!$userId) {
        return redirect()->route('login')->with('error', 'You must be logged in to subscribe.');
    }

    // Check for existing active subscription
    $activeSubscription = Subscription::where('user_id', $userId)
        ->where('status', 'active')
        ->first();

    if ($activeSubscription) {
        return redirect()->route('user.subscriptions.create')
            ->with('error', 'You already have an active subscription. Please cancel it before subscribing to a new plan.');
    }

    $benefits = $this->getSubscriptionBenefits($request->subscription_type);
    $benefitsJson = json_encode($benefits);
    $price = $this->getSubscriptionPrice($request->subscription_type);

    Subscription::create([
        'user_id' => $userId,
        'subscription_type' => $request->subscription_type,
        'start_date' => now(),
        'end_date' => $this->calculateEndDate($request->subscription_type),
        'status' => 'active',
        'price' => $price,
        'benefits' => $benefitsJson,
    ]);

    return redirect()->route('user.subscriptions.create')
        ->with('success', 'Subscription activated successfully!');
}


    private function calculateEndDate($type)
    {
        switch ($type) {
            case 'Weekly':
                return now()->addWeek();
            case 'Monthly':
                return now()->addMonth();
            case 'Yearly':
                return now()->addYear();
        }
    }

    private function getSubscriptionBenefits($type)
    {
        $benefits = [
            'Weekly' => ['Gym Access'],
            'Monthly' => ['Gym Access', 'Sauna Access', 'Jacuzzi Access', 'In-body Test'],
            'Yearly' => ['Gym Access', 'Sauna Access', 'Jacuzzi Access', 'In-body Test', 'Blogs', 'Premium Video Content'],
        ];

        return $benefits[$type] ?? [];
    }

    private function getSubscriptionPrice($type)
    {
        $prices = [
            'Weekly' => 18.00,
            'Monthly' => 65.00,
            'Yearly' => 600.00,
        ];

        return $prices[$type] ?? 0;
    }
}
