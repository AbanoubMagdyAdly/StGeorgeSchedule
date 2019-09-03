<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoom extends Model
{
    protected $table="user_room";
    
    protected $fillable = [
        'room_id', 'user_id', 'from', 'to', 'day' 
        ,'is_approved', 'meeting_name' , 'responsible_person' , 'repeating'
    ];


    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }


    public function rooms()
    {
        return $this->belongsToMany('App\Models\Room');
    }
}
