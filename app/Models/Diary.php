<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'user_id'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'diary_post', 'diary_id', 'post_id')->withTimestamps();
    }

    public function hasPost($post_id)
    {
        if ($this->posts()->where('post_id', $post_id)->first())
        {
            return true;
        }
        return false;
    }

    public function user()
    {
        return $this->belongTo('App\Models\User');
    }
}
