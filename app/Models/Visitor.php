<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
