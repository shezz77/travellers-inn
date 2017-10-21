<?php

namespace App\Providers;

use App\Models\PostUploadedData;
use App\Repositories\CategoryRepo;
use App\Repositories\Contracts\ICategoryRepo;
use App\Repositories\Contracts\ICountryRepo;
use App\Repositories\Contracts\IDiaryRepo;
use App\Repositories\Contracts\IHashTagRepo;
use App\Repositories\Contracts\IPostRepo;
use App\Repositories\Contracts\IPostUploadDataRepo;
use App\Repositories\Contracts\IResourceRepo;
use App\Repositories\Contracts\IRoleRepo;
use App\Repositories\Contracts\ISliderRepo;
use App\Repositories\Contracts\IUserRepo;
use App\Repositories\CountryRepo;
use App\Repositories\DiaryRepo;
use App\Repositories\HashTagRepo;
use App\Repositories\PostRepo;
use App\Repositories\PostUploadDataRepo;
use App\Repositories\ResourceRepo;
use App\Repositories\RoleRepo;
use App\Repositories\SliderRepo;
use App\Repositories\UserRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(IUserRepo::class,UserRepo::class);
        $this->app->bind(IResourceRepo::class,ResourceRepo::class);
        $this->app->bind(IHashTagRepo::class,HashTagRepo::class);
        $this->app->bind(IRoleRepo::class,RoleRepo::class);
        $this->app->bind(ICategoryRepo::class, CategoryRepo::class);
        $this->app->bind(ICountryRepo::class, CountryRepo::class);
        $this->app->bind(IPostRepo::class, PostRepo::class);
        $this->app->bind(IDiaryRepo::class, DiaryRepo::class);
        $this->app->bind(ISliderRepo::class, SliderRepo::class);
        $this->app->bind(IPostUploadDataRepo::class, PostUploadDataRepo::class);
    }
}
