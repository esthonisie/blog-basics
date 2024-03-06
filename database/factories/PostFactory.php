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
            'image_post' => '../storage/img/post-main-img/rijksmuseum-jgvancaspel-1912_1500px.webp',
            'image_card' => '../storage/img/post-main-img/rijksmuseum-jgvancaspel-1912_card.webp',
            'created_at' => fake()->unique()->dateTimeBetween('-2 years', '-3 months', null),
        ];
    }
}
