<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $messages = [
            'Hey, how are you?',
            'Just wanted to check in about the order.',
            'Can you send me the tracking info?',
            'Looking forward to receiving the product!',
            'Thanks for the quick response!',
            'Can I get a discount on my next order?',
            'Is this item still in stock?',
            'Can you recommend similar products?',
        ];
        return [
            'user_id' => User::factory(),
            'message' => $this->faker->randomElement($messages),
        ];
    }
}
