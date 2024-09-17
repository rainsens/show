<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function (Project $project) {
            $project->comments()->saveMany(
                Comment::factory()->count(5)->make()
            );
        });
    }
}
