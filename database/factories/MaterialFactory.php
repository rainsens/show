<?php

namespace Database\Factories;

use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Material>
 */
class MaterialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'material' => 'upload/WO76Gh10x4KYCYtSTOU6lkVgo3JLpTPM0Qj3OJ1l.pdf',
        ];
    }
}
