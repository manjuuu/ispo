@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Select an Available Form</div>
    <div class="panel-body">
      <div class="list-group">
        @foreach($forms as $form)
          <a href="{{ action('ResponseController@create', [$form->id]) }}" class="list-group-item">
            <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ $form->title }}</h4>
            <p class="list-group-item-text">...</p>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
