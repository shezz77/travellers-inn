<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use App\Utils\Globals\AppGlobal;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $this->getPermission($user, 'role.index');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Models\User $user
     * @return mixed
     * @internal param Role $role
     */

    public function view(User $user)
    {
        return $this->getPermission($user, 'role.index');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Models\User $user
     * @return mixed
     * @internal param Role $role
     */
    public function update(User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Models\User $user
     * @return mixed
     * @internal param Role $role
     */
    public function delete(User $user)
    {
        //
    }

    /**
     * @param User $user
     * @param $p
     * @return bool
     */
    public function getPermission(User $user, $p)
    {
//        dd($p);
        foreach ($user->roles as $role){
            if ($role->id == AppGlobal::SUPER_ADMIN){
                return true;
            }else {
                foreach ($role->resources as $resource) {
                    if ($resource->route == $p) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
