<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function cities(){
    	
    	return $this->hasMany('\App\City');
    }
}
