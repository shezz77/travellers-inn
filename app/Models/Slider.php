<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'category_id'
    ];
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'slider_post', 'slider_id', 'post_id')->withTimestamps();
    }

    public function hasPost($post_id)
    {
        if ($this->posts()->where('post_id', $post_id)->first())
        {
            return true;
        }
        return false;
    }


    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }

}
