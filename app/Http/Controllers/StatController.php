<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Closing;

class StatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      $total = DB::table('students')->count();
      $female = DB::table('students')->where('gender','female')->count();
      $male = DB::table('students')->where('gender','male')->count();
      $closings = Closing::all();
      return view('stat.index')->withTotal($total)->withFemale($female)->withMale($male)->withClosings($closings);	
    }

    public function filter(Request $request){
     
     if($request->ajax()){
       $total;$female;$male;
       $output = "";	
        $total = DB::table('students')->where('class',$request->class)->count(); 
        $female = DB::table('students')->where('class',$request->class)->where('gender','female')->count();
        $male = DB::table('students')->where('class',$request->class)->where('gender','male')->count();
        if($request->section){
	         $total = DB::table('students')->where('class',$request->class)->where('section',$request->section)->count();  
	         $female = DB::table('students')->where('class',$request->class)->where('section',$request->section)->where('gender','female')->count();
	         $male = DB::table('students')->where('class',$request->class)->where('section',$request->section)->where('gender','male')->count();
        } 



        $output .= '<li class="list-group-item">
  	 	   	          <p>Total Students <span class="pull-right w3-text-green">'.$total.'</span></p>
  	 	   	        </li>'.
  	 	   	        '<li class="list-group-item">
  	 	   	        	<p>Female <span class="pull-right w3-text-green">'.$female.'</span></p>
  	 	   	        </li>'.
  	 	   	       '<li class="list-group-item">
  	 	   	  	       <p>Male  <span class="pull-right w3-text-green">'.$male.'</span></p>
  	 	   	       </li>';
        return Response($output);

     }else{
     	return Response('');
     }

    }

}
