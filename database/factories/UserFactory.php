<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('000000'),
            'avatar' => fake()->randomElement(config('app.fake_avatars')),
            'title' => fake()->words(3, true),
            'address' => fake()->address(),
            'intro' => fake()->paragraph(10),
            'github' => "https://github.com",
            'linkedin' => "https://linkedin.com",
            'facebook' => "https://www.facebook.com",
            'twitter' => "https://www.twitter.com",
            'interest' => fake()->paragraph(5),
            'credit' => "The first credit: first credit\nThe second credit: second credit\nThe third credit: third credit\nThe fourth credit: fourth credit\nThe fifth credit: third credit",
            'remember_token' => Str::random(10),
            'is_agree' => true,
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
