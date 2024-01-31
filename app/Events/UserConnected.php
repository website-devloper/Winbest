<?php

// app/Events/UserConnected.php
namespace App\Events;

use App\Models\User; // Make sure to import the correct User class
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserConnected implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public function __construct(User $user) // Use the correct User class
    {
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user-status');
    }
}


