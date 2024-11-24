<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Display all subscriptions
    public function index()
    {
        $activeSubscriptionsCount = Subscription::where('status', 'active')->count();
        $expiredSubscriptionsCount = Subscription::where('status', 'expired')->count();
        $subscriptions = Subscription::all();

        return view('admins.subscriptions.index', compact('subscriptions', 'activeSubscriptionsCount', 'expiredSubscriptionsCount'));
    }

    // Show form to create a new subscription
    public function create()
    {
        return view('admins.subscriptions.create');
    }

    // Store a newly created subscription
    public function store(Request $request)
    {
    
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_type' => 'required|in:Monthly,Yearly,Weekly',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive,expired',
        ]);
        

        Subscription::create($request->all());

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully!');
    }

    // Show a specific subscription
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('admins.subscriptions.show', compact('subscription'));
    }

    // Show edit form
    public function edit(Subscription $subscription)
    {
        // dd($subscription);
        return view('admins.subscriptions.edit', compact('subscription'));
    }
    

    // Update subscription
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'subscription_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|string|in:active,inactive,expired',
        ]);
    
        $subscription = Subscription::findOrFail($id);
        $subscription->update($validated);
    
        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully');
    }
    
    // Delete subscription
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }
}
