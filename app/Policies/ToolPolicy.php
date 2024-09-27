<?php

namespace App\Policies;

use App\Models\Tool;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ToolPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Tool $tool): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Tool $tool): bool
    {
        //
    }

    public function delete(User $user, Tool $tool): bool
    {
        return $user->id === $tool->project->user_id;
    }

    public function restore(User $user, Tool $tool): bool
    {
        //
    }

    public function forceDelete(User $user, Tool $tool): bool
    {
        //
    }
}
