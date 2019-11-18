@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')

<div class="container-fluid">
  <form action="{{ route('student.update', $student->id) }}" method="POST">
        {{ csrf_field() }}
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	      <div class="panel panel-primary">
	      <div class="panel-heading">
	      	<h3>Edit Student Information</h3>
	      </div>
          <div class="panel-body w3-light-gray">
		  <div class="w3-row-padding">
		  	<div class="w3-half">
		  	    <h3 class="text-center w3-text-gray" >Student Data</h3>	
		  	    <hr>
		  	       <div class="form-group">
                    <label for="fname">Student Fullname / ሙሉ ስም</label>   
                  <div class="row">
                    <span class="col-md-4">   
                      <input name="fname" class="form-control" type="text" required placeholder="First Name / ስም" value="{{ $student->fname }}">
                    </span>
                    <span class="col-md-4">
                      <input name="mname" class="form-control" type="text" required placeholder="Middle Name / የአባት ስም" value="{{ $student->mname }}">
                    </span>
                    <span class="col-md-4">
                      <input name="lname" class="form-control" type="text" required placeholder="Last Name / የአያት ስም" value="{{ $student->lname }}">
                    </span> 
                  </div>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="row">
                    	@if($student->gender == "male")
                         <span class="col-md-3"><input name="gender" id="default-radio" type="radio" value="male" checked> Male</span>
                         <span class="col-md-3"><input name="gender" id="default-radio" type="radio" value="female"> Female </span>
                        @else
                         <span class="col-md-3"><input name="gender" id="default-radio" type="radio" value="male"> Male</span>
                         <span class="col-md-3"><input name="gender" id="default-radio" type="radio" value="female" checked> Female </span>
                        @endif
            
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                          <div class="col-md-6">
                            <label for="class">Class</label>
                            <input name="class" type="text" class="form-control" required placeholder="Class" value="{{ $student->class }}">
                          </div>  
                          <div class="col-md-6">
                            <label for="section">Section</label>
                          <input name="section" class="form-control" type="text" placeholder="section" value="{{ $student->section }}">
                          </div>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label>Age</label>
                            <input name="age" type="number" class="form-control" required placeholder="Age" value="{{ $student->age }}">
                          </div> 
                          <div class="col-md-4"><label>Kebele</label>
                           <input name="kebele" type="text" class="form-control" required placeholder="Kebele" value="{{ $student->kebele }}">
                        </div> 
                    </div> 
                </div>
		  	</div>
		  	<div class="w3-half w3-border-blue w3-leftbar">
		  	   <h3 class="text-center w3-text-gray">Guardian Data</h3><hr>
		  	       <label>Guardian Fullname / የወላጅ ሙሉ ስም</label>
		  	       <div class="form-group">
                 <div class="row">
                    <span class="col-md-4">   
                      <input name="gfname" class="form-control" type="text" required placeholder="First Name / ስም" value="{{ $guardian->fname }}">
                    </span>
                    <span class="col-md-4">
                        <input name="gmname" class="form-control" type="text" required placeholder="Middle Name / የአባት ስም" value="{{ $guardian->mname }}">
                    </span>
                    <span class="col-md-4">
                        <input name="glname" class="form-control" type="text" required placeholder="Last Name / የአያት ስም" value="{{ $guardian->lname }}">
                    </span> 
                 </div>
                </div> 
                <div class="form-group">
                    <label for="job">Job</label>
                    <input name="job" type="text" class="form-control" placeholder="job / ስራ" value="{{ $guardian->job }}">
                </div> 
                <div class="form-group">
                    <label for="office">Work area</label>    
                    <input name="office" type="text" class="form-control" placeholder="Work area / የስራ ቦታ(ወይም አይነት)" value="{{ $guardian->office }}"> 
                </div>   
                <label>Address</label>
                <div class="form-group">
                         <div class="row">
                          <span class="col-md-6">Kebele / ቀበሌ<input name="gkebele" type="text" class="form-control" required placeholder="Kebele / ቀበሌ" value="{{ $guardian->kebele }}"></span>
                          <span class="col-md-6">House NO / የቤት ቁጥር<input name="ghno" type="text" class="form-control" placeholder="House NO / የቤት ቁጥር" value="{{ $guardian->houseNo }}"></span>   
                          </div><br/>
                          <div class="row">
                              <span class="col-md-6">House Phone / የቤት ስልክ<input name="ghphone" type="text" class="form-control" placeholder="House Phone / የቤት ስልክ" value="{{ $guardian->housephone }}"></span>
                               <span class="col-md-6">Mobile Phone / የሞባይል ቁጥር<input name="gmobile" type="text" class="form-control" placeholder="Mobile Phone / የሞባይል ቁጥር" value="{{ $guardian->mobilephone }}"></span> 
                          </div>
                </div>
		  	</div>
		  </div>

		 </div>  
		 <!-- end panel body -->
		 <div class="row">
		 	<div class="col-md-12 w3-padding-small">
		 		<div class="pull-right">
		 		  <button class="btn btn-danger" type="reset">Clear</button>
		 	      <button class="btn btn-primary w3-margin-right" type="submit">Update</button>
		 		</div>
		 	</div>
		 </div>

		</div>
	  </div>
   </div>	

  </form>	
</div>




@endsection