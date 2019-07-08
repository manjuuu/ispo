@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Update diposes</div>
        <div class="panel-body"> 

@foreach($view as $member)

<form action="/update_dispose/<?php echo $member->id ?>" method="post">
  {{ csrf_field() }}
  
  <div class="form-group">
    <label>Id:</label>

    <input type="text" class="form-control" name="id" readonly value="<?php echo $member->id ?>">
  </div>
  <br>

  <div class="form-group">
    <label>Response request:</label>
    <textarea name="respons" class="form-control" style="width: 100%;height: 150px" >{{ $member->response_request }}</textarea>

    
  </div>
  
  <button type="submit" class="btn btn-success">Update</button>


</form> 

@endforeach









        	










          
        </div>
      </div>

@endsection