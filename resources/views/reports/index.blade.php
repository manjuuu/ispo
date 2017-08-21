@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Available Forms</div>
    <div class="panel-body">
      @if($forms->count() == 0)
        <div class="alert alert-danger">You have no forms available. Please speak with your line manager.</div>
      @endif
      <div class="list-group">
        @foreach($forms as $form)
          <div class="list-group-item">
            <h4 class="list-group-item-heading">
              <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ $form->title }}
              <div class="pull-right">
                <a class="btn btn-sm btn-default" href="{{ action('ResponseController@responses', [$form->id]) }}">View Responses</a>
              </div>
            </h4>
            {{ $form->group->title }}
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
