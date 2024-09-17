<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'image' => fake()->randomElement(config('app.fake_images')),
            'title' => fake()->sentence(),
        ];
    }
}
