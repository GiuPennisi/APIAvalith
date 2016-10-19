<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    public function client(){
    	return $this->belongsTo('App\Client');
    }

}
