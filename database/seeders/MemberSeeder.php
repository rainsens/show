<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Project;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function ($project) {
            $project->members()->saveMany(
                Member::factory()->count(3)->make()
            );
        });
    }
}
