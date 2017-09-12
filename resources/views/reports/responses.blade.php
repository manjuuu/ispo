@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Download {{ $form->title }}</div>
    <div class="panel-body">
      <div class="alert alert-info">If you require a report, please let us know and we can create automated reporting spesific for your needs. Contact us via the Help link.</div>
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Export <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="{{ $form->id }}/export/1">Yesterday</a></li>
          <li><a href="{{ $form->id }}/export/2">Last 7 Days</a></li>
          <li><a href="{{ $form->id }}/export/3">Last 14 Days</a></li>
          <li><a href="{{ $form->id }}/export/4">Last 30 Days</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">Responses for {{ $form->title }}</div>
    <div class="panel-body" style="overflow: auto">

      <table class="table table-hover table-condensed">
        <thead>
          <tr>
            <th>User</th>
            <th>Submitted</th>
            @foreach($questions as $question)
              <th>{{ $question->title }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($responses as $response)
          <tr>
            <td>{{ $response->user->username }}</td>
            <td>{{ $response->created_at }}</td>
            @foreach($questions as $question)
              <td>{{ $response->response_request['q'.$question->id] or 'Not Submitted'}}</td>
            @endforeach
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $responses->links() }}
    </div>
  </div>
@endsection
