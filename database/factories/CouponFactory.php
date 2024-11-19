<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'code' => strtoupper($this->faker->unique()->lexify('?????')),
            'discount_percentage' => $this->faker->randomFloat(2, 5, 50), // Random discount between 5% and 50%
            'usage_limit' => $this->faker->numberBetween(1, 100), // Limit on how many times the coupon can be used
            'expiry_date' => $this->faker->date(),
        ];
    }
}
