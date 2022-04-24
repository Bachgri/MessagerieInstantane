<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public  $name;public  $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(String $name, String $message){
        $this->name=$name;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn(){
        return new Channel('chat');
    }
    public function broadcastAs(){
        return 'chat-message';
    }
}