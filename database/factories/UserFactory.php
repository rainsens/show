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
            'social' => ['Facebook'],
            'interest' => fake()->paragraph(),
            'credit' => "My credit 1\nMy credit 2\nMy credit 3\n",
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
