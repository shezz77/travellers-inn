<?php

namespace App\Providers;

use App\Repositories\Contracts\IHashTagRepo;
use App\Repositories\HashTagRepo;
use App\Services\Contracts\IHashTagService;
use App\Services\HashTagService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IHashTagService::class,HashTagService::class);
    }
}
