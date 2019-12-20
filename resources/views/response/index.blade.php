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


        <table class="table">
        <thead>
          <tr>
            <th>Form</th>
            <th>Actions</th>
            <th>Mail</th>
          </tr>
        </thead>
        <tbody>
        @foreach($forms as $form)
        <tr>
          <td><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> {{ $form->title }} ({{ $form->group->title or 'Unkown Group'}})</td>
          <td>
                <a class="btn btn-sm btn-default" href="{{ action('ResponseController@create', [$form->id]) }}">Open Form</a>
                <a class="btn btn-sm btn-default" href="JavaScript:newPopup('{{ action('ResponseController@create', [$form->id]) }}');">Open a Popup</a>
          </td>
          <td>{{$form->mail}}</td>
          </tr>
        @endforeach
        </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
