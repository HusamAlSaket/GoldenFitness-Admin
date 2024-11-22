<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $equipmentTypes = ['dumbbell', 'treadmill', 'exercise ball', 'weight bench', 'kettlebell', 'barbell', 'rowing machine'];

        $descriptions = [
            'dumbbell' => 'A versatile piece of equipment for strength training. Perfect for building muscle and toning your arms, shoulders, and chest.',
            'treadmill' => 'An essential piece of cardio equipment for walking, jogging, or running indoors. It includes adjustable speed and incline for varied workouts.',
            'exercise ball' => 'A great tool for core strengthening exercises, balance training, and flexibility improvement.',
            'weight bench' => 'Designed for bench press exercises, this sturdy weight bench provides support for chest, shoulder, and triceps exercises.',
            'kettlebell' => 'Ideal for dynamic strength and conditioning workouts. This kettlebell enhances endurance, stability, and coordination.',
            'barbell' => 'A key piece of equipment for weightlifting, perfect for deadlifts, squats, and bench presses to improve overall strength.',
            'rowing machine' => 'A full-body workout machine that mimics rowing, improving cardiovascular health and toning muscles.',
        ];
        $equipmentType = $this->faker->randomElement($equipmentTypes);
        return [
            'category_id' => Category::factory(),
           'name' => $this->faker->word() . ' ' . $equipmentType,  // Name includes equipment type like 'Adjustable Dumbbell'
        'description' => $descriptions[$equipmentType],
            'price' => $this->faker->randomFloat(2, 10, 500),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
