<div class="modal fade" id="monthModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close w3-red w3-padding-small" data-dismiss="modal">&times;</button>
            <h4 class="modal-title w3-text-teal text-center"><strong>Select month to filter</strong></h4> 
        </div>
        <div class="modal-body">
           <button class="btn btn-primary btn-block" data-toggle="collapse" data-target="#col-month">
            Select month here 
           </button>
            <ul class="list-group collapse" id="col-month">
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'september') }}">September</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'october') }}">October</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'november') }}">November</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'december') }}">December</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'january') }}">January</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'february') }}">February</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'march') }}">March</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'april') }}">April</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'may') }}">May</a></li>
               <li class="list-group-item"><a href="{{ route('payment.notpaid', 'june') }}">June</a></li>
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
        </div>
      </div>
    </div>
  </div>