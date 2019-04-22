@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Export in a CSV for {{ $form->title }}</div>
    <div class="panel-body">
      <form class="form-inline" method="POST">
      {{ csrf_field() }}
      <label class="sr-only" for="inlineFormInputName2">Date From</label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="dte_from" placeholder="mm/dd/yyyy">
        <label class="sr-only" for="inlineFormInputName2">Date To</label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="dte_to" placeholder="mm/dd/yyyy">
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>
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
