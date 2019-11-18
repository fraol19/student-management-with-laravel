@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')

<div class="container">
	<div class="row">
	  <div class="col-md-8 col-md-offset-2">
	  	<form action="{{ route('student.basic.update', $student->id) }}" method="POST">
	  		{{ csrf_field() }}
	  		<div class="panel panel-primary">
	  		  <div class="panel-heading">
	  		  	 <h3 class="text-center">Student Data</h3>	
		  	     <hr>
	  		  </div>
	  		  <div class="panel-body">
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
	                            <input name="age" type="number" class="form-control" required placeholder="Age" value="{{ $student->age }}">
	                          </div> 
	                          <div class="col-md-4"><label>Kebele</label>
	                           <input name="kebele" type="text" class="form-control" required placeholder="Kebele" value="{{ $student->kebele }}">
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
	  	</form>
	  </div>
	</div>
</div>


@endsection