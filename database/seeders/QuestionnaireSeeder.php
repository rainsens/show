<?php

namespace Database\Seeders;

use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            $user->questionnaires()->saveMany(
                Questionnaire::factory()->count(1)->make()
            );
        });
    }
}
