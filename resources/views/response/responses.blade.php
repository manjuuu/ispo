 
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
        @foreach($log as $key=>$value)
    
            {{ csrf_field() }}
    <div class="form-group">
        <label>{{$key}}:@foreach($join_logs as $join_log) {{$join_log->title}} @endforeach</label>
   
    <input type="text" name="<?php echo $key ?>" value="<?php echo $value ?>" class="form-control">
    </div>
    @endforeach 
    <input type="submit" name="" class="btn btn-success">
</form>

@endforeach



</div>
@endsection