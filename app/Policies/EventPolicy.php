<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Event $timeline): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Event $timeline): bool
    {
        //
    }

    public function delete(User $user, Event $event): bool
    {
        return $user->id === $event->project->user_id;
    }

    public function restore(User $user, Event $timeline): bool
    {
        //
    }

    public function forceDelete(User $user, Event $timeline): bool
    {
        //
    }
}
