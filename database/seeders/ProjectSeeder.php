<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Link;
use App\Models\Material;
use App\Models\Member;
use App\Models\Permit;
use App\Models\Slide;
use App\Models\Event;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            $user->projects()->saveMany(
                Project::factory()->count(2)->make()
            );
        });

        Project::all()->each(function ($project) {
            $project->members()->saveMany(Member::factory()->count(5)->make());
            $project->slides()->saveMany(Slide::factory()->count(5)->make());
            $project->images()->saveMany(Image::factory()->count(3)->make());
            $project->events()->saveMany(Event::factory()->count(10)->make());
            $project->links()->saveMany(Link::factory()->count(5)->make());
            $project->materials()->saveMany(Material::factory()->count(5)->make());
            $project->comments()->saveMany(Comment::factory()->count(5)->make());
            //$project->permits()->saveMany(Permit::factory()->count(5)->make());
        });
    }
}
