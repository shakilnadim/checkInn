<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $primaryKey = 'placeUrl';
    public $incrementing = false;

    public function hotels(){
        return $this->hasMany('App\Hotel');
    }
}
