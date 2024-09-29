<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SlideSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $screenId;
    public array $slides;

    public function __construct($screenId, array $slides)
    {
        $this->screenId = $screenId;
        $this->slides = $slides;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel("screen_{$this->screenId}"),
        ];
    }

    public function broadcastWith(): array
    {
        return ['slides' => $this->slides];
    }
}
