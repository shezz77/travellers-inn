<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyResetPassword;
use Illuminate\Notifications\Notifiable;
use PhpParser\Node\Stmt\DeclareDeclare;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'user_name', 'email', 'password', 'address', 'date_of_birth', 'gender', 'phone_number', 'state_id', 'status', 'verify_token'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    /**
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles))
        {
            foreach ($roles as $role)
            {
                if ($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }

    /**
     * @param $role
     */
    public function assignRole($role)
    {
        $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * @return string
     */
    public function homeUrl()
    {
        if ($this->hasRole('user')) {
            $url = route('user.home');
        } else {
            $url = route('admin.home');
        }

        return $url;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialLogins()
    {
        return $this->hasMany('App\Models\SocialLogin');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function visitors()
    {
        return $this->hasMany('App\Models\Visitor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function notifications()
    {
        return $this->belongsToMany('App\Models\Post', 'notifications', 'follow_id',    'post_id' )->withPivot(['status'])->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentLikes()
    {
        return $this->hasMany('App\Models\LikesOnComment');
    }
    public function fetchUsers(array $params){

    }

    // This function allows us to get a list of users following us

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany('App\Models\User', 'followings', 'follow_id', 'user_id')->withTimestamps();
    }

    // Get all users we are following

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function following()
    {
        return $this->belongsToMany('App\Models\User', 'followings', 'user_id', 'follow_id')->withTimestamps();
    }

    public function hasAction($user)
    {
        if ($this->followers()->where('user_id', $user)->first())
        {
            return true;
        }
        return false;
    }

    public function hashTags()
    {
        return $this->hasMany('App\Models\HashTag');
    }

    public function diaries()
    {
        return $this->hasMany('App\Models\Diary');
    }

    public function resources()
    {
        $resources = [];
        $result = null;
        $roles = $this->roles;
        foreach ($roles as $role)
        {
            foreach ($role->resources as $resource)
            {

                $resources[] = $resource;
            }
        }

        $result = array_unique($resources, SORT_REGULAR);
        return $result ;
    }
}
