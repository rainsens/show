<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Link;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Link $link): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Link $link): bool
    {
        //
    }

    public function delete(User $user, Link $link): bool
    {
        return $user->id === $link->project->user_id;
    }

    public function restore(User $user, Link $link): bool
    {
        //
    }

    public function forceDelete(User $user, Link $link): bool
    {
        //
    }
}
