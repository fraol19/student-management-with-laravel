@if($errors->any())
   <div class="container">
   @foreach($errors->all() as $error)
       <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>{{ $error }}</strong>
       </div>

   @endforeach
   </div>
@endif