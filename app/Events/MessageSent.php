<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('community-channel.' . $this->message->community_id),
        ];
    }
    
    // public function broadcastWith()
    // {
    //     return [
    //         'id' => $this->message->id,
    //         'user_id' => $this->message->user_id,
    //         'message' => $this->message->message,
    //         'created_at' => $this->message->created_at->toDateTimeString(),
    //     ];
    // }
}
