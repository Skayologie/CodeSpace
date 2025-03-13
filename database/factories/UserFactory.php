<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'), // Default password: 'password'
            'profilePicture' => 'DefaultAvatar.jpg',
            'bio' => fake()->sentence(10),
            'github' => fake()->optional()->url(),
            'linkedin' => fake()->optional()->url(),
            'twitter' => fake()->optional()->url(),
            'activityScore' => fake()->numberBetween(0, 1000),
            'email_verified_at' => fake()->optional()->dateTime(),
            'last_login_at' => fake()->optional()->dateTime(),
            'remember_token' => Str::random(10),
            'deleted_at' => null, // Soft delete (optional)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
