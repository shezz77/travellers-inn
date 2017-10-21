<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'notifications', 'post_id',    'follow_id');
    }

}
