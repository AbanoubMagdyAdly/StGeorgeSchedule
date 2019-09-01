<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnBookReasons extends Model
{
    protected $table="un_book_reasons";
    
    protected $fillable = [
        'room_id', 'user_id', 'from', 'to', 'day' ,'reason'
    ];
}
