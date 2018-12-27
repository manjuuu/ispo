@extends('app')

@section('content')
	<div class="panel panel-default">
    <div class="panel-heading text-center"><strong>Add New Group</strong></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-12">
          {!! BootForm::open(['url' => action('GroupController@store')]) !!}
            {!! BootForm::text('title', ['html' => 'Group Title <span class="" style="color:red">*</span>']) !!}
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-default" href="{{ action('GroupController@index') }}">Cancel</a>
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection