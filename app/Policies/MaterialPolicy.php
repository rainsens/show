<?php

namespace App\Policies;

use App\Models\Material;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MaterialPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Material $material): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Material $material): bool
    {
        //
    }

    public function delete(User $user, Material $material): bool
    {
        return $user->id === $material->project->user_id;
    }

    public function restore(User $user, Material $material): bool
    {
        //
    }

    public function forceDelete(User $user, Material $material): bool
    {
        //
    }
}
