<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'building', 'capacity', 'has_air_conditioner', 'has_tv'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_rooms');
    }
}
