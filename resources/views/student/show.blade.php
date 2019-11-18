@extends('layouts.app')

@section('content')
@include('includes.errors')
@include('includes.success')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $student->fname }}'s Information</div>

                <div class="panel-body">
                   <div class="panel w3-light-gray">
                      <div class="panel-heading"><strong>Basic Info</strong></div> 
                      <div class="panel-body">
                         <table class="table table-condensed">
                                <thead>
                                    <tr>
                                       <th>Name</th>
                                       <th>Gender</th> 
                                       <th>Class</th>
                                       <th>Section</th> 
                                       <th>Age</th> 
                                       <th>Kebele</th>   
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $student->fname }}&nbsp;{{ $student->mname }}&nbsp;{{ $student->lname }}</td> 
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>{{ $student->section }}</td>
                                        <td>{{ $student->age }}</td>
                                        <td>{{ $student->kebele }}</td>
                                    </tr>
                                </tbody>
                        </table> 
                      </div>
                      <div class="panel-footer">
                         <a href="{{ route('student.basic', $student->id) }}" class="btn btn-primary">Edit student</a>
                         <button data-toggle="collapse" data-target="#sibling" class="btn w3-pink">Siblings</button>
                         <div class="collapse" id="sibling">
                          @if(count($student->guardian->students) < 2)
                            <div class="jumbotron w3-xxxlarge">No Siblings</div>
                          @else
                          <ul class="list-group list-unstyled">
                            @foreach($student->guardian->students as $sibling)
                             @if($sibling->id != $student->id) 
                                <li class="list-group-item">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <p class="w3-text-gray">{{ $sibling->fname }}&nbsp;{{ $sibling->mname }}&nbsp;{{ $sibling->lname }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ url('/student/'.$sibling->id) }}">More</a>
                                        <a class="btn btn-warning" href="{{ url('/payment/'.$sibling->id) }}">Payment Detail</a>
                                        </div>
                                    </div>
                                    </div>
                                </li>
                              @endif
                            @endforeach
                           </ul> 
                          @endif
                         </div>
                      </div>
                   </div> 
                   
                    <div class="panel w3-light-gray">
                      <div class="panel-heading"><strong>Gaurdian Info</strong></div> 
                      <div class="panel-body">
                          <table class="table table-condensed">
                                <thead>
                                    <tr>
                                       <th>Gaurdian Name</th>
                                       <th>Job</th> 
                                       <th>Work Place(office)</th> 
                                       <th>Kebele</th> 
                                       <th>House NO</th>
                                       <th>Phone Number</th> 
                                       <th>Mobile Phone</th>  
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $student->guardian->fname }}&nbsp;{{ $student->guardian->mname }}&nbsp;{{ $student->guardian->lname }}</td>
                                        <td>{{ $student->guardian->job }}</td>
                                        <td>{{ $student->guardian->office }}</td>
                                        <td>{{ $student->guardian->kebele }}</td>
                                        <td>{{ $student->guardian->houseNo }}</td>
                                        <td>{{ $student->guardian->housephone }}</td>
                                        <td>{{ $student->guardian->mobilephone }}</td>
                                    </tr>
                                </tbody>
                           </table>
                      </div>
                      <div class="panel-footer">
                         <a href="{{ route('student.guardian', $student->id) }}" class="btn btn-primary">Edit guardian</a>
                      </div>
                    </div>   
                    
                    @if($bus)
                    <div class="panel w3-light-gray">
                       <div class="panel-heading"><strong>Bus Service Info</strong></div> 
                        <div class="panel-body">
                            <table class="table table-condensed">
                                  <thead>
                                      <tr>
                                         <th>Responsible person</th>
                                         <th>RelationShip</th> 
                                         <th>Kebele</th> 
                                         <th>House NO</th>
                                         <th>Distance in(KM)</th> 
                                         <th>Mobile Phone</th>  
                                      </tr> 
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>{{ $bus->fname }}&nbsp;{{ $bus->mname }}&nbsp;{{ $bus->lname }}</td>
                                          <td>{{ $bus->relation }}</td>
                                          <td>{{ $bus->kebele }}</td>
                                          <td>{{ $bus->houesno }}</td>
                                          <td>{{ $bus->km }}</td>
                                          <td>{{ $bus->mobilephone }}</td>
                                      </tr>
                                  </tbody>
                             </table>
                        </div>
                        <div class="panel-footer">
                          <a href="{{ route('student.bus', $student->id) }}" class="btn btn-primary">Edit bus service information</a>
                          <a href="{{ route('bus.destroy', $student->id) }}" class="btn btn-danger">Stop Bus service</a>
                        </div>
                    </div>
                    @else
                     <div class="jumbotron">
                        <p>Bus Service is not included for this student!</p>
                         <a href="{{ route('student.bus', $student->id) }}" class="btn btn-success">Start bus service</a>
                     </div>
                    @endif
                    
                    @if($preclass)
                    <div class="panel w3-light-gray">
                       <div class="panel-heading"><strong>Pre School Info</strong></div> 
                        <div class="panel-body">
                            <table class="table table-condensed">
                                  <thead>
                                      <tr>
                                         <th>School Name</th>
                                         <th>Class</th> 
                                         <th>GPA(mark)</th> 
                                         <th>Behaviour</th>
                                         <th>extra descriptions</th>  
                                      </tr> 
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>{{ $preclass->school_name }}</td>
                                          <td>{{ $preclass->preclass }}</td>
                                          <td>{{ $preclass->gpa }}</td>
                                          <td>{{ $preclass->behaviour }}</td>
                                          <td>{{ $preclass->info }}</td>
                                      </tr>
                                  </tbody>
                             </table>
                        </div>
                        <div class="panel-footer">
                           <a href="{{ route('student.preclass', $student->id) }}" class="btn btn-primary">Edit</a>
                           <a href="{{ route('preclass.destroy', $student->id) }}" class="btn btn-danger">wipe pre-class data</a>
                        </div>
                    </div>
                    @else
                     <div class="jumbotron">
                        <p>no previous school data is available for this student!</p>
                         <a href="{{ route('student.preclass', $student->id) }}" class="btn btn-success">Add pre-class information</a>
                     </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection