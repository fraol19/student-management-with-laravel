<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentsController extends Controller
{
    
   public function __construct(){

      $this->middleware('auth');
   }

   public function index(){
      return view('parental');
   }

   public function store(Request $request){

   }

}
