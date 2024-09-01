<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;
use App\Models\Category;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word,
            'content' =>fake()->text(200),
            'luggage' => fake()->randomNumber(5,false),
            'doors' => fake()->numberBetween(2, 5),
            'passengers' => fake()->randomNumber(5,false),
            'price' => fake()->randomFloat(2, 10000, 50000),
            'active' => $this->faker->randomElement(['yes', 'no']),
            'image' => 'images/' . $this->faker->image(public_path('images'), 640, 480, 'cars', true) , 
            'category_id' => Category::inRandomOrder()->first()->id
        ];
    }
}
