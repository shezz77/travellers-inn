<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikesOnComment extends Model
{
    public function comment()
    {
        return $this->belongsTo('App\Models\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
