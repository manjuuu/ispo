@extends('app')

@section('content')
	<div class="panel panel-default">
    <div class="panel-heading text-center"><strong>Add New User</strong></div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-12">
          {!! BootForm::open(['url' => action('UserController@store')]) !!}

            {!! BootForm::text('username', ['html' => 'WIN ID <span class="" style="color:red">*</span>']) !!}
            {!! BootForm::text('name', ['html' => 'Name <span class="required" style="color:red">*</span>']) !!}

           
            {!! BootForm::text('admin', ['html' => 'Admin <span class="required" style="color:red">* &nbsp; Note : Add 1 for admin and 0 for non-admin in below text box.</span>']) !!} 

            {!! BootForm::select('group_id', ['html' => 'Group <span class="required" style="color:red">*</span>'], $groups->pluck('title', 'id')) !!}
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-default" href="{{ action('UserController@index') }}">Cancel</a>
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection