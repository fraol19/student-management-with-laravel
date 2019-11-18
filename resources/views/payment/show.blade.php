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
                   <div class="panel w3-black">
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
                                       <th>Payment paused on</th>
                                       @if($student->bus)
                                         <th>Monthly bus payment</th>
                                       @endif 
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
                                        <td>{{ $month->month }}</td>
                                        @if($student->bus)
                                         <td>{{ $student->bus->km * 3 }} birr</td>
                                        @endif 
                                    </tr>
                                </tbody>
                        </table> 
                      </div>
                   </div> 

                   <div class="panel panel-default">
                      <div class="panel-heading"><strong>Basic Info</strong></div> 
                      <div class="panel-body">
                         <table class="table table-condensed ">
                                <thead>
                                    <tr>
                                       <th>Month</th>
                                       <th>Monthly payment</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr><td>September</td>
                                        <td>
                                          @if($payment->september > 0)
                                            {{ $payment->september }} &nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="september">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>
                                    <tr><td>October</td>
                                        <td>
                                          @if($payment->october > 0)
                                            {{ $payment->october }} &nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="october">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr> 
                                    <tr><td>November</td>
                                        <td>
                                          @if($payment->november  > 0)
                                            {{ $payment->november }} &nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="november">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>  
                                    <tr><td>December</td>
                                        <td>
                                          @if($payment->december > 0)
                                            {{ $payment->december }} &nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="december">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>   
                                    <tr><td>January</td>
                                        <td>
                                          @if($payment->january > 0)
                                            {{ $payment->january }}&nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="january">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr> 
                                    <tr><td>February</td>
                                        <td>
                                          @if($payment->february > 0)
                                            {{ $payment->february }}&nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="february">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>    
                                    <tr><td>March</td>
                                        <td>
                                          @if($payment->march > 0)
                                            {{ $payment->march }}&nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="march">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>    
                                    <tr><td>April</td>
                                        <td>
                                          @if($payment->april > 0)
                                            {{ $payment->april }}&nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="april">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>  
                                    <tr><td>May</td>
                                        <td>
                                          @if($payment->may > 0)
                                            {{ $payment->may }}&nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="may">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr> 
                                    <tr><td>June</td>
                                        <td>
                                           @if($payment->june > 0)
                                            {{ $payment->june }}&nbsp; *paid
                                          @else
                                            <form class="form-inline" action="{{ route('payment.recieve',$student->id) }}" method="POST">
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                <input type="text" name="regular" class="form-control" placeholder="not paid">
                                              </div>
                                              @if($student->bus)
                                              <div class="form-group">
                                                <input type="text" name="busp" class="form-control" placeholder="bus fee not paid">
                                              </div>
                                              @endif
                                              <input type="hidden" name="month" value="june">
                                              <button type="submit" class="btn btn-primary">pay</button>
                                           </form>
                                          @endif
                                        </td>
                                    </tr>                     
                                </tbody>
                                <tfoot>
                                   <tr>
                                     <td>Total</td>
                                     <td>{{ $payment->total }}</td>
                                   </tr>
                                </tfoot>
                        </table> 
                      </div>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection