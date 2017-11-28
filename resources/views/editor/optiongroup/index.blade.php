@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Edit Option Group</div>
    <div class="panel-body">
      <p><a class="btn btn-success" href="{{ action('OptionGroupController@create') }}">New Option Group</a></p>
      <div class="list-group">
        @foreach($optiongroups as $optiongroup)
          <div class="list-group-item">
            <h4 class="list-group-item-heading">
              <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ $optiongroup->title }}
              <div class="pull-right">
                <a class="btn btn-sm btn-default" href="{{ action('OptionGroupController@edit', [$optiongroup->id]) }}">Edit</a>
              </div>
            </h4>
            {{ $optiongroup->group->title or 'Unknown' }}
          </div>
        @endforeach
      </div>
      {{ $optiongroups->links() }}
    </div>
  </div>
@endsection
