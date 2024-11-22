<?php
namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        $comments = [
            'This product is amazing! Highly recommend it.',
            'Not bad, but could be better. The quality was okay.',
            'I absolutely love this product! Worth every penny.',
            'It didn’t meet my expectations, but it works.',
            'Good value for the price. Satisfied with my purchase.',
            'Disappointing. The product broke after a few uses.',
            'It’s fine, but I expected more from this brand.',
        ];
        
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->randomElement($comments),
            'status' => $this->faker->randomElement(['pending', 'approved', 'declined']),
        ];
    }
}
