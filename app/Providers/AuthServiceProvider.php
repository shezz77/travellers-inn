<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('role', 'App\Policies\RolePolicy');
        Gate::define('role.index', 'App\Policies\RolePolicy@index');
//        Gate::define('checkPermission', 'App\Policies\PermissionPolicy@checkPermission');

        Gate::define('checkPermission', function ($user, $user2, $route) {
            return PermissionPolicy::checkPermission($user, $route);
        });
    }
}
