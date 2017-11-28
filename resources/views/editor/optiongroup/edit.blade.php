@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Edit {{ $optiongroup->title }}</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4">
          {!! BootForm::open(['url' => action('FormController@update', [$optiongroup->id])]) !!}
            {!! BootForm::text('title', 'Option Group Name', $optiongroup->title) !!}
            <div class="form-group "><label for="title" class="control-label">Group</label><div>{{ $optiongroup->group->title }}</div></div>
            <button type="submit" class="btn btn-default">Update</button>
            <input type="hidden" name="_method" value="PUT" />
          {!! BootForm::close() !!}
          <br/>
          {!! BootForm::open(['url' => action('FormController@destroy', [$optiongroup->id])]) !!}
            <button type="submit" class="btn btn-danger">Delete Option Group</button>
            <input type="hidden" name="_method" value="DELETE" />
          {!! BootForm::close() !!}

        </div>
        <div class="col-sm-8">
          <ul>
            @foreach($optiongroup->options as $option)
              <li><b><a href="{{ action('OptionController@edit', [$option->id]) }}">{{ $option->title }}</a></b></li>
            @endforeach
            @if(count($optiongroup->options) == 0)
              <li>There are no options on this option group.</li>
            @endif
          </ul>
          <p><a class="btn btn-success" href="{{ action('OptionController@create', ['option_group_id' => $optiongroup->id]) }}">New Option</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection
