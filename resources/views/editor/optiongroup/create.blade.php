@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">New Option Group</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4">
          {!! BootForm::open(['url' => action('OptionGroupController@store')]) !!}
            {!! BootForm::text('title', 'Option Group Name') !!}
            {!! BootForm::select('group_id', 'Group', $groups->pluck('title', 'id')) !!}
            <p><small class="text-danger">Once you set a group, you can't change the group for the Option Group.</small></p>
            <button type="submit" class="btn btn-default">Create</button>
          {!! BootForm::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
