<?php

namespace App\Listeners;

use App\Events\ViewPostEvent;
use App\Models\Post;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ViewPostListener
{
    public $session;
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ViewPostEvent $event
//     * @param $session
     * @return void
     */
    public function handle(ViewPostEvent $event)
    {
        $post = $event->post;
//        $post->increment('views');

        if (!$this->isPostViewed($post))
        {
            $post->increment('views');

            $this->storePost($post);
        }
    }

    public function isPostViewed(Post $post)
    {
        // Get all the viewed posts from the session. If no
        // entry in the session exists, default to an
        // empty array.
        $viewed = \Session::get('viewed_posts', []);

        // Check the viewed posts array for the existence
        // of the id of the post
        return in_array($post->id, $viewed);
    }

    public function storePost($post)
    {
        // Push the post id onto the viewed_posts session array.
        \Session::push('viewed_posts', $post->id);
    }
}
