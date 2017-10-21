<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLogin extends Model
{
    protected $fillable = [
        'provider', 'social_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
