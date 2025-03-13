<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
            //
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'categoryID' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'userId' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'reactions' => fake()->numberBetween(0, 1000),
            'down_votes' => fake()->numberBetween(0, 500),
            'up_votes' => fake()->numberBetween(0, 500),
            'status' => fake()->randomElement(['published', 'draft', 'archived']),
            'views'=>fake()->randomNumber()
        ];
    }
}
