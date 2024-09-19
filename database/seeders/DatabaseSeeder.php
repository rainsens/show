<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call($this->seeders());
    }

    protected function seeders(): array
    {
        return [
            UserSeeder::class,
            ProjectSeeder::class,
            QuestionnaireSeeder::class,
            InquirySeeder::class,
        ];
    }
}
