<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $cover = $this->faker->randomElement(config('app.fake_images'));

        return [
            'initiator' => fake()->name(),
            'title' => fake()->sentence,
            'cover' => $cover,
            'brief' => fake()->paragraph(1),
            'detail' => fake()->paragraph(10),
            'progress' => rand(0, 100),
            'is_team' => 1,
            'team_name' => fake()->name(),
            'is_private' => rand(0, 1),
        ];
    }
}
