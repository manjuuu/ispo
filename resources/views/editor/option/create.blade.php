@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">New Option on Option Group: {{ $option_group->title }}</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4">
          {!! BootForm::open(['url' => action('OptionController@store')]) !!}
            {!! BootForm::text('title', 'Option Text', '') !!}
            <input type="hidden" name="option_group_id" value="{{ $option_group->id }}" />
            <button type="submit" class="btn btn-default">Create</button>
          {!! BootForm::close() !!}
        </div>
        <div class="col-sm-8">
        </div>
      </div>
    </div>
  </div>
@endsection
