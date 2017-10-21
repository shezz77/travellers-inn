<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'route', 'display_name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'resource_role', 'resource_id', 'role_id')->withTimestamps();
    }

    public function users()
    {
        $users = [];
        $checkDuplicates = [];
        $roles = $this->roles;
        $this->name;


        foreach ($roles as $role)
        {
            foreach ($role->users as $user)
            {
                if (array_search($user->id, $checkDuplicates))
                    continue;
                else
                {
                    $users[] = $user;
                    $checkDuplicates[] = $user->id;
                }

            }
        }

        return $users;
    }
}
