<?php

namespace Alnutile\LaravelChatgpt\Events;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SearchResults implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public ResponseDto $responseDto)
    {
        //
    }

    public function broadcastOn()
    {
        return new Channel('search-results');
    }
}
