@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Update diposes</div>
        <div class="panel-body"> 


@foreach($logarray as $key=>$value)
{{$key}}:{{$value}} <br>
@endforeach
      </div>
      </div>

@endsection