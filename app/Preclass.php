<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preclass extends Model
{
    
  protected $fillabel = ['school_name','behaviour','preclass','gpa','info'];

  public function student(){
     return $this->belongsTo('App\Student');	
  }
 

}
