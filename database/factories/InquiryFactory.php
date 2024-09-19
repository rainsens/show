<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => str_replace('.', '?', $this->faker->sentence()),
            'answer' => $this->faker->paragraph(),
        ];
    }
}
