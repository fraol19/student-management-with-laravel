@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')

<div class="container">
	<div class="row">	
      <div class="col-md-8 col-md-offset-2">
      	 <form action="{{ route('student.guardian.update', $student->id) }}" method="POST">
      	 	{{ csrf_field() }}
      	 	<div class="panel panel-primary">
      	 	   <div class="panel-heading">
      	 	   	  <h3 class="text-center">Guardian Data</h3><hr>
      	 	   </div>	

      	 	   <div class="panel-body">
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