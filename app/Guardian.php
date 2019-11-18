<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    
  protected $fillable = ['fname','mname','lname','job','office','kebele','houseNo','housephone','mobilephone'];
 
 
  public function students(){
    return $this->hasMany('App\Student');
  }

}
