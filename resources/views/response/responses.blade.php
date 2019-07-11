 
@extends('app')
@section('content')
@if (Session::get('updated'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
	        <strong>{{ Session::get('updated') }}</strong>
	</div>
	@endif
<div class="panel panel-info">
    <div class="panel-heading">Edit the response request</div>
    <div class="panel-body">
        @foreach($logs as $values)
         <form action="/updateresponse/<?php echo $values->id ?>" method="post"> 
            
            {{ csrf_field() }}
        
    
    <div class="form-group">
    <label for="email">responses:</label>
    
    <textarea class="form-control" name="myresponse" style="width: 100%;height: 200px">{{$values->response_request}}</textarea>
    </div>
    
 <input type="submit" name="" class="btn btn-success">
</form>

@endforeach
</div>
@endsection