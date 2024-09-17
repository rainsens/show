<?php

namespace Database\Factories;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Slide>
 */
class SlideFactory extends Factory
{
    public function definition(): array
    {
        return [
            'slide' => fake()->randomElement(config('app.fake_images')),
            'title' => fake()->sentence(),
        ];
    }
}
