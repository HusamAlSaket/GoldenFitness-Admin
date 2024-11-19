<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Retrieve counts for displaying on the admin dashboard
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalCoupons = Coupon::count();
        $totalSubscriptions = Subscription::count();
    
        return view('admins.dashboard', compact(
            'totalUsers', 'totalOrders', 'totalProducts', 'totalCoupons', 'totalSubscriptions'
        ));
    }
    

}
