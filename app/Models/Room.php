<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'building', 'capacity', 'has_air_conditioner', 'has_tv' ,'in_maintenance'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\Models\UserRoom');;
    }
}
