@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Update Option on Option Group: {{ $option_group->title }}</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4">
          {!! BootForm::open(['url' => action('OptionController@update', [$option->id])]) !!}
            {!! BootForm::text('title', 'Option Text', $option->title) !!}
            <button type="submit" class="btn btn-default">Update</button>
            <input type="hidden" name="_method" value="PUT" />
          {!! BootForm::close() !!}
          <br/>
          {!! BootForm::open(['url' => action('OptionController@destroy', [$option->id])]) !!}
            <button type="submit" class="btn btn-danger">Delete Option</button>
            <input type="hidden" name="_method" value="DELETE" />
          {!! BootForm::close() !!}
        </div>
        <div class="col-sm-8">
        </div>
      </div>
    </div>
  </div>
@endsection
