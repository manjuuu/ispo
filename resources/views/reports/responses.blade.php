@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Download {{ $form->title }}</div>
    <div class="panel-body" style="overflow: auto">
      <div class="alert alert-info">If you require a report, please let us know and we can create automated reporting spesific for your needs. Contact us via the Help link.</div>
      <a class="btn btn-primary" href="#{{-- {{ $form->id }}/export --}}">Coming Soon</a>

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
