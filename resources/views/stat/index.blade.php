@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')
  <div class="container">
  	 <div class="row">
  	 	<div class="col-md-6">
  	 	   <ul class="list-group list-unstyled">
  	 	   	  <li class="list-group-item">
  	 	   	    <p>Total Students <span class="pull-right w3-text-green">{{ $total }}</span></p>	
  	 	   	  </li>
  	 	   	  <li class="list-group-item">
  	 	   	  	<p>Female <span class="pull-right w3-text-green">{{ $female }}</span></p>
  	 	   	  </li>
  	 	   	  <li class="list-group-item">
  	 	   	  	<p>Male  <span class="pull-right w3-text-green">{{ $male }}</span></p>
  	 	   	  </li>
  	 	   </ul>
  	 	   <br>
  	 	   	
  	 	   <div class="panel panel-default">
  	 	   	 <div class="panel-heading"><h4>Filter by class and section</h4></div>
  	 	   	 <div class="panel-body">
  	 	   	 	<ul class="list-unstyled list-group" id="filterd">
  	 	   	 		
  	 	   	 	</ul>
  	 	   	 	<div class="form-group">
  	 	   	 		<input id="class" type="text" name="class" class="form-control" placeholder="Class" required>
  	 	   	 	</div>
  	 	   	 	<div class="form-group">
  	 	   	 		<input id="section" type="text" name="section" class="form-control" placeholder="Section / you can leave this empty if needed">
  	 	   	 	</div>
  	 	   	 	<div class="pull-right">
  	 	   	 		<button id="filter" class="btn btn-primary">Filter</button>
  	 	   	 	</div>
  	 	   	 </div>
  	 	   </div>
  	 	</div>
  	 	<div class="col-md-6">
  	 		<div class="row">
  	 			<div class="col-md-12">
  	 				<a href="{{ route('payment.close') }}" class="btn btn-danger btn-block">Close Payment (click here if the academic year is ended)</a>
  	 			</div>
  	 		</div>
  	 		<div class="row">
  	 		  <div class="col-md-12">
  	 		  	<ul class="list-unstyled list-group">
  	 		  	   @foreach($closings as $closing)
  	 		  	     <li class="list-group-item"><p>total cash recieved from students in &nbsp;{{ $closing->year }} <span class="pull-right w3-text-brown">{{ $closing->total }}</span></p></li>	
  	 		  	   @endforeach 
  	 		  	</ul>
  	 		  </div>	
  	 		</div>
  	 	</div>
  	 </div>
  </div>
@endsection

@section('scripts')
  <script>
  	 $('#filter').on('click', function(){
         $class = $("#class").val();
         $section = $("#section").val();
         $.ajax({
	           type: 'get',
	           url: '{{ route('stat.filter') }}',
	           data: {'class': $class, 'section': $section},
	           success: function(data){
	           	   $('#filterd').html(data);
             }
        });  
          
  	  });
  </script>
@endsection