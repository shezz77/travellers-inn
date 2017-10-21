<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'comment'
    ];

    public function commentLikes()
    {
        return $this->hasMany('App\Models\LikesOnComment');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }

    public function hasLike($user)
    {
        if ($this->commentLikes()->where('user_id', $user)->first())
        {
            return true;
        }
        return false;
    }
}
