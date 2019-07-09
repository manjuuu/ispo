@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Find all diposes</div>
        <div class="panel-body">
        <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Dispose(response request)</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($lists as $member)

      <tr>
        <td>{{ $member->id }}</td>
        <td>{{ $member->response_request }}</td>
        <td><a href="/diposes/edit/<?php echo $member->id ?>" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"></span> Edit</a>
        	<a href="/diposes/trash/<?php echo $member->id ?>" class="btn btn-warning">  <span class="glyphicon glyphicon-trash"></span> Trash </a>

        </td>

      
      </tr>
     @endforeach
    </tbody>
  </table>


          
        </div>
      </div>

@endsection