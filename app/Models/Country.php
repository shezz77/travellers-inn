<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'phone_code'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany('App\Models\State');
    }

    public function users()
    {
        return $this->hasManyThrough('App\Models\User','App\Models\State');
    }

    /**
     * @param $id
     * @return bool
     */
    public function hasState($id)
    {
        if ($this->states()->where('id', $id)->first())
        {
            return true;
        }
        return false;    }
}
