<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
   
  protected $fillable = ['fname','mname','lname','relation','kebele','houseno','mobilephone','km'];
  
  public function student(){
  	return $this->belongsTo('App\Student');
  }

}
