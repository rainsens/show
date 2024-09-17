<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'when' => now()->subDays(rand(1, 30)),
            'event' => $this->faker->word(),
            'summary' => $this->faker->sentence(3),
        ];
    }
}
