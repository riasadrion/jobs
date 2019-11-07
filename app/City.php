<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function location(){

    	return $this->belongsTo('\App\Location');
    }

    public function jobs(){

            return $this->hasMany('App\Job');
        }
}
