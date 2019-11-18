@extends('layouts.app')
@section('head')
 <style>
     body{
        background-color: #ccc;
     }
 </style>
@endsection
@section('content')
  @include('includes.success')
  @include('includes.errors')
  @include('includes.modals')
  <div class="container">
    <div class="row">
     <div class="col-md-8 col-md-offset-2"> 
   
    <form action="{{ route('studregister.step1') }}" method="POST" id="studForm">
        {{ csrf_field() }}
        <div class="panel">
         <div class="panel-heading w3-flat-peter-river">
            <h2 class="text-center text-dark"><strong>Student Registration Form / የተማሪ መረጃ መመዝገቢያ ቅጽ</strong></h2> 
         </div> 
         <div class="panel-body w3-flat-peter-river">  
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="form-group">
                    <label for="fname">Student Fullname / ሙሉ ስም</label>   
                  <div class="row">
                    <span class="col-md-4">   
                      <input name="fname" class="form-control" type="text" required placeholder="First Name / ስም">
                    </span>
                    <span class="col-md-4">
                      <input name="mname" class="form-control" type="text" required placeholder="Middle Name / የአባት ስም">
                    </span>
                    <span class="col-md-4">
                      <input name="lname" class="form-control" type="text" required placeholder="Last Name / የአያት ስም">
                    </span> 
                  </div>
                  </div>
                    <div class="form-group">
                      <label>Gender</label>
                        <div class="row">
                          <span class="col-md-3"><input name="gender" id="default-radio" type="radio" value="male" checked> Male</span>
                          <span class="col-md-3"><input name="gender" id="default-radio" type="radio" value="female"> Female </span>
      
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="class">Class</label>
                            <input name="class" type="text" class="form-control" required placeholder="Class">
                          </div>  
                          <div class="col-md-6">
                            <label for="section">Section</label>
                            <input name="section" class="form-control" type="text" placeholder="section">
                          </div>
                        </div>
                    </div> 
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-4"><label>Age</label>
                            <input name="age" type="number" class="form-control" required placeholder="Age">
                          </div> 
                          <div class="col-md-4"><label>Kebele</label>
                           <input name="kebele" type="text" class="form-control" required placeholder="Kebele">
                          </div> 
                        </div> 
                    </div>   
                    </div> 
           </div>
           @include('includes.parental')
           <div class="row">
              <div class="col-md-8 col-md-offset-2">
                 <a href="#parentModal" data-toggle="modal" class="btn btn-block w3-brown"><h4>Fill Guardian Data</h4></a>
              </div>
           </div>
           <br>
           <div class="row">
              <div class="col-sm-8 col-md-offset-1">
                   <div class=""><strong>Are you coming from another school / ከሌላ ትምህርት ቤት ነዉ የመጡት？</strong></div>
                   <input type="radio" name="nschool" value="1"><span> Yes</span>
                   <input type="radio" name="nschool" value="0" checked="checked"><span> NO</span>
                   <a id="modalViewer2" href="#newStudModal" data-toggle="modal" class="btn w3-black btn-sm hide w3-animate-right">fill form here/ ከሌላ ትምህርት ቤት ለመጡ ተማሪዎች ቅጽ እዚ ይሙሉ</a>
              </div>
           </div>
           <div class="row">
           	  <div class="col-md-6 col-md-offset-1">
           	  	   <div class=""><strong>Bus Service / ባስ የሚጠቀሙ ክሆነ</strong></div>
           	  	   <input type="radio" name="bus" value="1"><span> Yes</span>
           	  	   <input type="radio" name="bus" value="0" checked="checked"><span> NO</span>
           	  	   <a id="modalViewer" href="#busModal" data-toggle="modal" class="btn w3-black btn-sm hide w3-animate-right">fill bus form here/ የ ባስ ቅጽ ለመሙላት እዚ ይንኩ</a>
           	  </div>
           </div>
         </div>   
          <div class="panel-footer w3-flat-asbestos">
            <div class="row">
                <div class="col-md-5 col-md-offset-9"> 
                 <button type="reset" class="btn w3-text-black w3-hover-red">Clear</button>
                 <button type="submit" class="btn w3-text-black w3-hover-blue">Next</button>
                </div>
            </div> 
         </div>
       </div>  
   </form> 
  </div>
 </div>   
</div>

@endsection
