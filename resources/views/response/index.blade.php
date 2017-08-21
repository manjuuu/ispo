@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Your Submissions for Today</div>
        <div class="panel-body">
          @if($today->count() == 0)
            <div class="alert alert-info">You have not submitted anything today.</div>
          @endif
          <ul>
            @foreach($today as $entry)
              <li>{{ $entry->title }} <span class="badge">{{ $entry->aggergate }}</span></li>
            @endforeach
          </ul>
        </div>
      </div>
      @if(Auth::user()->admin == 0)

      <div class="panel panel-default">
        <div class="panel-heading">Groups Access</div>
        <div class="panel-body">
          @if($groups->count() == 0)
            <div class="alert alert-danger">You have no forms you can access.</div>
          @endif

          <ul>
            @foreach($groups as $group)
              <li>
                {{ $group->title }}
                @if($group->can_edit == 1)
                  <span class="badge">editor</span>
                @elseif($group->can_enroll == 1)
                  <span class="badge">enroller</span>
                @endif
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif
    </div>

      <div class="col-md-8">
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
                <a class="btn btn-sm btn-default" href="{{ action('ResponseController@create', [$form->id]) }}">Open Form</a>
                <a class="btn btn-sm btn-default" href="JavaScript:newPopup('{{ action('ResponseController@create', [$form->id]) }}');">Open a Popup</a>
              </div>
            </h4>
            {{ $form->group->title }}
          </div>
        @endforeach
      </div>
      {{ $forms->links() }}
    </div>
  </div>
</div>
@endsection
