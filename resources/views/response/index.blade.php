@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Select an Available Form</div>
    <div class="panel-body">
      <div class="list-group">
        @if($forms->count() == 0)
          <div class="alert alert-danger">You have no forms available. Please speak with your line manager.</div>
        @endif
        @foreach($forms as $form)
          <a href="JavaScript:newPopup('{{ action('ResponseController@create', [$form->id]) }}');" class="list-group-item">
            <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ $form->title }}</h4>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
