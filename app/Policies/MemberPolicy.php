<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MemberPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Member $member): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Member $member): bool
    {
        //
    }

    public function delete(User $user, Member $member): bool
    {
        return $user->id === $member->project->user_id;
    }

    public function restore(User $user, Member $member): bool
    {
        //
    }

    public function forceDelete(User $user, Member $member): bool
    {
        //
    }
}
