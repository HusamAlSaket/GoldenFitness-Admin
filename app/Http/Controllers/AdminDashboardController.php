<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        //fetching data for dashboard cards
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalCoupons = Coupon::count();
        $Subscriptions = Subscription::where('status', 'active')->count();


        // Calculate monthly sales
        $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total_sales')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('total_sales', 'month');

        // Calculate active subscriptions only by month
        $activeSubscriptions = Subscription::selectRaw('MONTH(created_at) as month, COUNT(*) as total_active_subscriptions')
            ->where('status', 'active') 
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('total_active_subscriptions', 'month');

        // Initialize empty arrays for all months
        $salesData = [];
        $subscriptionData = [];

        for ($i = 1; $i <= 12; $i++) {
            //To Fill missing months with 0 for both sales and subscriptions
            $salesData[$i] = $monthlySales[$i] ?? 0;
            $subscriptionData[$i] = $activeSubscriptions[$i] ?? 0;
        }
        // dd($salesData);


        $totalSubscriptions = array_sum($subscriptionData);
        // dd($subscriptionData);

        return view('admins.dashboard', compact(
            'totalUsers', 'totalOrders', 'totalProducts', 'totalCoupons','Subscriptions',
        ))->with([
            'salesDataJson' => json_encode($salesData),
            'subscriptionDataJson' => json_encode($subscriptionData),
        ]);

    }
}


