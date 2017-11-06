@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Edit Forms</div>
    <div class="panel-body">
      <p><a class="btn btn-success" href="{{ action('FormController@create') }}">New Form</a></p>
      <div class="list-group">
        @foreach($forms as $form)
          <div class="list-group-item">
            <h4 class="list-group-item-heading">
              <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ $form->title }}
              <div class="pull-right">
                <a class="btn btn-sm btn-default" href="{{ action('FormController@edit', [$form->id]) }}">Edit</a>
              </div>
            </h4>
            {{ $form->group->title }}
          </div>
        @endforeach
      </div>
      {{ $forms->links() }}
    </div>
  </div>
@endsection
