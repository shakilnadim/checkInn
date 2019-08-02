<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

    public function rooms(){
        return $this->hasMany('App\Room');
    }
}
