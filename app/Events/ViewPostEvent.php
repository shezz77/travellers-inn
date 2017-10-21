<?php

namespace App\Events;

use App\Models\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ViewPostEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;


    /**
     * Create a new event instance.
     * @param Post $post
     * @internal param Store $session
     */
    public function __construct(Post $post)
    {
        $this->post = $post;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
