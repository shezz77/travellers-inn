<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'contact_name', 'contact_email', 'contact_subject', 'contact_message'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
