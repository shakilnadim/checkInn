<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    // one to many relationship with places
    public function place(){
        return $this->belongsTo('App\Place');
    }

    // many to one relationship with room details
    public function roomDetails(){
        return $this->hasMany('App\RoomDetails');
    }
}
