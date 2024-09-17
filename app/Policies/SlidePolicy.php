<?php

namespace App\Policies;

use App\Models\Slide;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SlidePolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Slide $slide): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Slide $slide): bool
    {
        //
    }

    public function delete(User $user, Slide $slide): bool
    {
        return $user->id === $slide->project->user_id;
    }

    public function restore(User $user, Slide $slide): bool
    {
        //
    }

    public function forceDelete(User $user, Slide $slide): bool
    {
        //
    }
}
