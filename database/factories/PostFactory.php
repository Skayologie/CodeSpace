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

        $postType = fake()->randomElement(['text-only', 'image', 'video', 'text-image', 'text-video']);

        return [
            //
            'title' => fake()->sentence(),
            'content' => $this->generateContent($postType),
            'multimedia'=>$this->generateMultimedia($postType),
            'categoryID' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'userId' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'reactions' => fake()->numberBetween(0, 1000),
            'down_votes' => fake()->numberBetween(0, 500),
            'up_votes' => fake()->numberBetween(0, 500),
            'status' => fake()->randomElement(['published', 'draft', 'archived']),
            'views'=>fake()->randomNumber()
        ];
    }


    private function generateContent($type)
    {
        return in_array($type, ['text-only', 'text-image', 'text-video']) ? fake()->paragraph("20") : null;
    }

    /**
     * Generate multimedia content dynamically.
     */
    private function generateMultimedia($type)
    {
        return match ($type) {
            'image', 'text-image' => fake()->imageUrl(640, 480, 'posts'),
            'video', 'text-video' => fake()->url(), // Replace with actual video upload logic if needed
            default => null,
        };
    }

}
