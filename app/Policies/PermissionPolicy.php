<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;
use App\Utils\Globals\AppGlobal;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     */
    public function __construct()
    {
        //
    }

    public static function checkPermission(User $user, $route)
    {
        $resource = Resource::where('route', $route)->first();

        if (!$resource) {
            return true;
        }else{
            foreach ($user->roles as $role) {
                if ($role->id == AppGlobal::SUPER_ADMIN) {
                    return true;
                } else {
                    foreach ($role->resources as $resource) {
                        if ($resource->route == $route) {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }
}
