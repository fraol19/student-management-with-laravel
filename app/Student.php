<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   
  protected $fillable = ['fname','mname','lname','gender','class','section','age','guardian_id','kebele']; 
    
  public function guardian(){
  	return $this->belongsTo('App\Guardian');
  }

  public function preclass(){
  	return $this->hasOne('App\Preclass');
  }

   public function bus(){
  	return $this->hasOne('App\Bus');
  }

}
