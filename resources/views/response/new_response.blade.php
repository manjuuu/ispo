@extends('app')
@section('content')
<div class="panel panel-info">
	<div class="panel-heading">Edit the response request</div>
	<div class="panel-body">
		@foreach($logs as $values)
		 <form action="/updateresponse/<?php echo $values->id ?>" method="post"> 
			
			{{ csrf_field() }}
		@foreach($logarray as $key=>$value)
	
	<div class="form-group">
    <label for="email">{{$key}}:</label>
    <input type="text" class="form-control" id="email" value="{{$value}}">
  	</div>
  	@endforeach
 <input type="submit" name="" class="btn btn-success">
</form>

@endforeach
</div>
@endsection 