<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSubscriptionController extends Controller
{


    public function index()
    {
        $subscriptions = Subscription::where('user_id', Auth::id())->get();
        return view('users.subscriptions.index', compact('subscriptions'));
    }

    public function show($id)
    {
        $subscription = Subscription::where('user_id', Auth::id())
            ->findOrFail($id);
        return view('users.subscriptions.show', compact('subscription'));
    }

    public function create()
    {
        return view('users.subscriptions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subscription_type' => 'required|in:Weekly,Monthly,Yearly',
        ]);

        $benefits = $this->getSubscriptionBenefits($request->subscription_type);
        $benefitsJson = json_encode($benefits);
        $price = $this->getSubscriptionPrice($request->subscription_type);

        // Ensure user is authenticated and user_id is set
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'You must be logged in to subscribe.');
        }
        $benefitsJson = $benefitsJson ?: json_encode([]); // Default to empty array if benefits are null

        Subscription::create([
            'user_id' => $userId,
            'subscription_type' => $request->subscription_type,
            'start_date' => now(),
            'end_date' => $this->calculateEndDate($request->subscription_type),
            'status' => 'active',
            'price' => $price,
            'benefits' => $benefitsJson,
        ]);
        return redirect()->route('user.subscriptions.index')
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
