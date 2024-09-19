<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class QuestionnaireSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            $user->questionnaires()->saveMany(
                Questionnaire::factory()->count(1)->make(),
            );
        });
        Questionnaire::all()->each(function ($questionnaire) {
            $questionnaire->questions()->saveMany(Question::factory()->count(5)->make());
        });
        User::all()->each(function ($user) {
            Question::all()->each(function ($question) use ($user) {
                Answer::create([
                    'user_id' => $user->id,
                    'questionnaire_id' => $question->questionnaire_id,
                    'question_id' => $question->id,
                    'answer' => fake()->sentence(3),
                ]);
            });
        });
    }
}
