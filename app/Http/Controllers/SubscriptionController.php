<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // Display all subscriptions
    public function index(Request $request)
    {
        $subscriptions = Subscription::query()
            ->with('user') // Ensure the user relationship is loaded
            ->when($request->search, function ($query, $search) {
                // Combining both user and subscription_type search
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->where('subscription_type', 'like', "%{$search}%");
            })
            ->get();

        $activeSubscriptionsCount = $subscriptions->where('status', 'active')->count();
        $expiredSubscriptionsCount = $subscriptions->where('status', 'expired')->count();

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
            'subscription_type' => 'required|in:Weekly,Monthly,Yearly',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date', // ensure end_date is valid
            'status' => 'required|in:active,inactive,expired',
        ]);

        $benefits = $this->getSubscriptionBenefits($request->subscription_type);
        $price = $this->getSubscriptionPrice($request->subscription_type);

        Subscription::create([
            'user_id' => $request->user_id,
            'subscription_type' => $request->subscription_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date ?? $this->calculateEndDate($request->subscription_type), // Calculate end_date if not provided
            'status' => $request->status,
            'price' => $price,
            'benefits' => json_encode($benefits), // Save benefits as JSON
        ]);

        return redirect()->route('subscriptions.index')->with('success_add', 'Subscription created successfully!');
    }
    
    // Show a specific subscription
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->benefits = json_decode($subscription->benefits, true); // Decode JSON benefits
        return view('admins.subscriptions.show', compact('subscription'));
    }

    // Show edit form
    public function edit(Subscription $subscription)
    {
        $subscription->benefits = json_decode($subscription->benefits, true); // Decode JSON benefits
        return view('admins.subscriptions.edit', compact('subscription'));
    }

    // Update subscription
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'subscription_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date', // Ensure end_date is valid
            'status' => 'required|string|in:active,inactive,expired',
        ]);

        $subscription = Subscription::findOrFail($id);
        $benefits = $this->getSubscriptionBenefits($validated['subscription_type']);
        $price = $this->getSubscriptionPrice($validated['subscription_type']);

        $subscription->update(array_merge($validated, [
            'price' => $price,
            'benefits' => json_encode($benefits), // Save benefits as JSON
        ]));

        return redirect()->route('subscriptions.index')->with('success_edit', 'Subscription updated successfully');
    }

    // Delete subscription
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }

    // Calculate benefits based on subscription type
    private function getSubscriptionBenefits($type)
    {
        $benefits = [
            'Weekly' => ['Gym Access'],
            'Monthly' => ['Gym Access', 'Sauna Access', 'Jacuzzi Access', 'In-body Test'],
            'Yearly' => ['Gym Access', 'Sauna Access', 'Jacuzzi Access', 'In-body Test', 'Blogs', 'Premium Video Content'],
        ];

        return $benefits[$type] ?? [];
    }

    // Calculate subscription price
    private function getSubscriptionPrice($type)
    {
        $prices = [
            'Weekly' => 18.00,
            'Monthly' => 65.00,
            'Yearly' => 600.00,
        ];

        return $prices[$type] ?? 0;
    }

    // Calculate end date based on subscription type
    private function calculateEndDate($type)
    {
        switch ($type) {
            case 'Weekly':
                return now()->addWeek();
            case 'Monthly':
                return now()->addMonth();
            case 'Yearly':
                return now()->addYear();
            default:
                return null;
        }
    }
}
