<?php

namespace Alnutile\LaravelChatgpt\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class ModerationFailed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Request $request)
    {
        logger('Event moderation failed');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
