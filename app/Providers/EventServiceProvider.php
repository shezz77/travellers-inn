<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ViewPostEvent' => ['App\Listeners\ViewPostListener',],
        'App\Events\CreatePostEvent' => ['App\Listeners\CreatePostListener',],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
//        Event::subscribe('posts.view', 'App\Events\ViewPostHandler');
        parent::boot();

        //
    }
}
