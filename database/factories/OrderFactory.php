<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Associate with a User
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'total_price' => $this->faker->randomFloat(2, 10, 1000), // Random price between 10 and 1000
        ];
    }
}
