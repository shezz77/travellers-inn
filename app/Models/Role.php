<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array|string description
 * @property array|string role_name
 */
class Role extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function resources()
    {
        return $this->belongsToMany('App\Models\Resource', 'resource_role', 'role_id', 'resource_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'role_user', 'role_id', 'user_id');
    }

    /**
     * @param $resources
     * @return bool
     */
    public function hasAnyResource($resources)
    {
        if (is_array($resources))
        {
            foreach ($resources as $resource)
            {
                if ($this->hasAction($resource))
                {
                    return true;
                }
            }
        }
        else {
            if ($this->hasAction($resources)) {
                return true;
            }
        }
        return false;
    }

    public function hasAction($resource)
    {
        if ($this->resources()->where('route', $resource)->first())
        {
            return true;
        }
        return false;
    }

    /**
     * @param $resource
     * @return bool
     * @internal param $role
     */
    public function hasResource($resource)
    {
        if ($this->resources()->where('name', $resource)->first())
        {
            return true;
        }
        return false;
    }

    public function assignResource($role)
    {
        $this->resources()->attach($role);
    }

    public function removeResource($role)
    {
        return $this->resources()->detach($role);
    }
}