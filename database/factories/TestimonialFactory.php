<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
                'name' => fake()->name(),
                'position' => fake()->word,
                'content' => $this->faker->text(200),
                'published' => $this->faker->randomElement(['yes', 'no']),
              'image' => 'images/' . $this->faker->image(public_path('images'), 640, 480, 'people', false)  
        ];
    }
}
