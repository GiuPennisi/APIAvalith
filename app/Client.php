<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function computers(){
    	return $this->hasMany('App\Computer');

    }

    public function monitors(){
    	return $this->hasMany('App\Computer');
    }
}
