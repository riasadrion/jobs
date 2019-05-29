<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //


    public function category(){

    	return $this->belongsTo('App\Category');
    }


   public function type(){

   	return $this->belongsTo('App\Type');
   
   }

   public function city(){

   	return $this->belongsTo('App\City');
   
   }
}
