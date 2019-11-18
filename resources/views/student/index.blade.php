@extends('layouts.app')
@section('content')
  @include('includes.success')
  @include('includes.errors')
  @include('includes.month')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading text-center">Student Management <a href="{{ route('student.viewall') }}" class="btn btn-primary pull-right">All Students</a>
                <a href="#monthModal" data-toggle="modal" class="btn btn-warning pull-left">students that do not paid thier fee</a>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                  	 <input id="search" type="text" class="form-control" placeholder="search..." name="search">
                  </div>


                  <div class="table-responsive">
                  	<table class="table">
                  	   <thead>
                  	   	  <tr>
          					        <th>ID</th>
          					        <th>Firstname</th>
          					        <th>Middlename</th>
          					        <th>LastName</th>
          					        <th>Gender</th>
          					        <th>Class</th>
                            <th>Section</th>
          					        <th>Age</th>
          					        <th>Kebele</th>
          					        <th>Details</th>
          					        <th>Payment Details</th>
                            <th colspan="2">Actions</th>
          					      </tr>
                  	   </thead>
                  	   <tbody id="tbody">
                  	   	  @if($students)
                
                            @foreach($students as $student) 
                              <tr>
                                <td>{{ $student->id }}</td>  
                                <td>{{ $student->fname }}</td>
                                <td>{{ $student->mname }}</td>
                                <td>{{ $student->lname }}</td>
                                <td>{{ $student->gender }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->section }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->kebele }}</td>
                                <td><a class="btn btn-sm btn-primary" href="{{ url('/student/'.$student->id) }}">More</a></td>
                                <td><a class="btn btn-sm btn-warning" href="{{ url('/payment/'.$student->id) }}">Payment Detail</a></td>
                                <td><a class="btn btn-sm w3-teal" href="{{ route('student.edit', $student->id) }}">Edit</a></td>
                                <td>
                                  <a class="btn btn-sm btn-danger" href="{{ route('student.destroy', $student->id) }}">Delete</a>
                                </td>
                              </tr>
                            @endforeach
                          @endif
                  	   </tbody>
                    </table>
                  </div>
     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  

@section('scripts')

  <script type="text/javascript">
  	  $('#search').on('keyup', function(){
         $value = $(this).val();
         $.ajax({
	           type: 'get',
	           url: '{{ route('payment.search') }}',
	           data: {'search': $value},
	           success: function(data){
	           	   $('tbody').html(data);
             }
        });  
          
  	  });
  </script>

@endsection