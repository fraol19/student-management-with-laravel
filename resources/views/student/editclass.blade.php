@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ route('student.preclass.update', $student->id) }}" method="POST">
				{{ csrf_field() }}
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h1>Edit Pre-class information</h1>
					</div>
					<div class="panel-body">
						<div class="form-group">
			                <label for="school">School</label>
			                <input class="form-control" name="school" type="text" placeholder="previous school" value="{{ $preclass==null ? '' : $preclass->school_name }}">
			            </div>
			            <div class="form-group">
			                  <div class="row">
			                    <div class="col-md-3"><label>Last Year Class</label>
			                        <input class="form-control" name="preclass" type="text" placeholder="pre class" value="{{ $preclass==null ? '' : $preclass->preclass }}">
			                    </div>
			                    <div class="col-md-3"><label>GPA</label>
			                        <input class="form-control" name="gpa" type="decimal" placeholder="gpa" value="{{ $preclass==null ? '' : $preclass->gpa }}">
			                    </div>
			                    <div class="col-md-6"><label>Behaviour</label>
			                        <input class="form-control" name="behave" type="text" placeholder="pre behaviour" value="{{ $preclass==null ? '' : $preclass->behaviour }}">
			                    </div>
			                  </div>  
			            </div>
			            <div class="form-group">
			                  <label for="descript">Student additional Information</label>
			                  <textarea name="descript" class="form-control" style="height: 106px;" placeholder="extra information">{{ $preclass==null ? '' : $preclass->info }}</textarea>
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
				</div>
			</form>
		</div>	
	</div>
</div>


@endsection