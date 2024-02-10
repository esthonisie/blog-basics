<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,3),
            'title' => fake()->unique()->sentence(),
            'body' => fake()->text(1000),
            'image_path' => '../img/rijksmuseum-JGvanCaspel-1912-1080px.jpg',
            'published_at' => fake()->unique()->dateTimeBetween('-2 years', '-3 months', null),
        ];
    }
}
