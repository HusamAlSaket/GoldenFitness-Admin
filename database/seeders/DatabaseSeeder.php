<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Subscription;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generate 10 fake users
        User::factory(10)->create();

        // Generate 5 fake orders
        Order::factory(5)->create();

        // Generate 5 fake products
        Product::factory(5)->create();

        // Generate 3 fake coupons
        Coupon::factory(3)->create();

        // Generate 3 fake subscriptions
        Subscription::factory(3)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
