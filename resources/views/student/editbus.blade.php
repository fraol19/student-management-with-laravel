@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ route('student.bus.update',$student->id) }}" method="POST">
				{{ csrf_field() }}
				<div class="panel panel-primary">
                <div class="panel-heading">
                	<h1>Edit Bus service information</h1>
                </div>

                <div class="panel-body">
					<div class="form-group">
		            <label for="fname" class="w3-text-black">Guardian Fullname/ የተቀባይ ሙሉ ስም</label>
		            <div class="row">
		              <span class="col-md-4">   
		                <input name="bgFname" class="form-control" type="text" placeholder="First Name / ስም" value="{{ $bus==null ? '' : $bus->fname }}">
		              </span>
		              <span class="col-md-4">
		                <input name="bgMname" class="form-control" type="text" placeholder="Middle Name / የአባት ስም" value="{{ $bus==null ? '' : $bus->mname }}">
		              </span>
		              <span class="col-md-4">
		                <input name="bgLname" class="form-control" type="text" placeholder="Last Name / የአያት ስም" value="{{ $bus==null ? '' : $bus->lname }}">
		              </span> 
		           </div>  
		          </div>
		          <div class="form-group">
		             <label class="w3-text-black">Relation/ ዝምድና</label>
		             <input name="brelation" type="text" class="form-control" placeholder="Relationship/ዝምድና" value="{{ $bus==null ? '' : $bus->relation }}">
		          </div>
		          <div class="form-group">
		             <label class="w3-text-black">Distance(Km) / ርቀት( በ ኪሜ)</label>
		             <input name="bdistance" type="text" class="form-control" placeholder="Distance/ርቀት" value="{{ $bus==null ? '' : $bus->km }}">
		          </div>
		          <div class="form-group">
		            <label class="w3-text-black">Address/ አድራሻ</label>
		            <div class="row">
		               <span class="col-md-4">kebele/ቀበሌ<input name="bkebele" type="text" class="form-control" placeholder="kebele/ቀበሌ" value="{{ $bus==null ? '' : $bus->kebele }}"></span>
		               <span class="col-md-4">House No/የቤት ቁጥር<input name="bhno" type="text" class="form-control" placeholder="House No/የቤት ቁጥር" value="{{ $bus==null ? '' : $bus->houesno }}"></span>
		               <span class="col-md-4">Mobile/ስልክ ቁጥር<input name="bmobile" type="text" class="form-control" placeholder="Mobile/ስልክ ቁጥር" value="{{ $bus==null ? '' : $bus->mobilephone }}"></span>
		            </div>
		          </div>

		          <div class="row">
			 	    <div class="col-md-12 w3-padding-small">
			 		<div class="pull-right">
			 		  <button class="btn btn-danger" type="reset">Clear</button>
			 	      <button class="btn btn-primary w3-margin-right" type="submit">Update</button>
			  		</div>
			  	  </div>
			     </div>
              </div> 
              <!-- end panel body -->
              </div>
              <!-- end panel -->
			</form>
		</div>
	</div>
</div>

@endsection