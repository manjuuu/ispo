@extends('app')

@section('content')
  <div class="panel panel-default">

    <div class="panel-heading">Export in a CSV for {{ $form->title }}</div>
    <div><p style="color:red">Note : User needs to enters a date range in below dates tabs to export data . <br> Example : If user want to export data for the date '03/10/2021' then he sholud enter date range like [03/10/2021 to 03/11/2021] or [03/09/2021 to 03/11/2021]</p></div>
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
