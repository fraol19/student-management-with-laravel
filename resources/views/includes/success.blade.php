@if(session('success'))
  <div class="container">
	  <div class="alert alert-success alert-dismissable fade in">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong id="success">{{ session('success') }}</strong>
	  </div>
  </div>
@endif