<?php

namespace App\Listeners;

use App\Models\Post;
use App\Models\Notification;
use App\Events\CreatePostEvent;
use App\Utils\AuthWrapper;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePostListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatePostEvent  $event
     * @return void
     */
    public function handle(CreatePostEvent $event)
    {
        $post = $event->post;
//        $notification = new Notification;
//        $notification->follow_id = $post->user()->followers();
//        dd($notification);
//        $notification->post_id = $post->id;
//        $notification->status = 1;
//        $notification->save();

    }
}
