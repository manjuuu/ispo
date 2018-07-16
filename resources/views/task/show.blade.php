@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-4">

        @if(!empty($task->queue->instructions))
          <div class="panel panel-default">
        <div class="panel-heading">Task Instructions</div>
        <div class="panel-body">
        <p>{!! $task->queue->instructions !!}
        </div>
      </div>
        @endif
      <div class="panel panel-default">
        <div class="panel-heading">Task Details</div>
        <div class="panel-body">
              @if(count($task->task_details) == 0)
        <div class="alert alert-danger">There is no details for this task.</div>
        @else
          <ul>
            @foreach($task->task_details as $key => $detail)
                <li><b>{{ $key }}</b>: {!! $detail or 'No detail provided.' !!}</li>
            @endforeach
          </ul>
                @endif
        </div>
      </div>
            <div class="panel panel-default">
        <div class="panel-heading">Task Info</div>
        <div class="panel-body">
          <ul>
            <li><b>Imported by</b>: {{ $task->importedBy->name or 'Automated Import'}}</li>
            @if($task->created_at)
              <li><b>Created</b>: <abbr title="{{ $task->created_at or 'Unknown' }}">{{ $task->created_at or 'Unknown' }}</abbr></li>
            @else
              <li><b>Created</b>: No Create Date</li>
            @endif
            <li><b>Task ID</b>: {{ $task->id }}</li>
          </ul>
        </div>
      </div>
    </div>

      <div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">Task Response</div>
    <div class="panel-body">
      <div class="alert alert-danger" id="rsvErrors" style="display: none;"></div>
      {!! BootForm::open(['url' => 'task', 'id' => 'responseForm', 'onsubmit' => 'return rsv.validate(this, formRules)']) !!}
      @foreach($task->queue->questions as $question)
        @includeIf('questiontype.'.$question->questiontype->type)
        <small class="form-text text-muted">{{$question->help}}</small>
      @endforeach
        <input type="hidden" name="_task" value="{{ encrypt($task->id) }}" />
        <div class="form-group">
          <div>
            <input class="btn btn-link" name="_savestate" type="submit" value="Save"> 
            <a href="{{ action('QueueController@index') }}" class="btn btn-link">Cancel</a>
            <a href="{{ action('TaskController@skip', [$task->id]) }}" class="btn btn-link">Snooze</a>
          </div>
        </div>
      {!! BootForm::close() !!}
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  function sweetFormIssue(f, errorInfo) {
    for (var i=0; i<errorInfo.length; i++) {
      swal({
        text: errorInfo[i][1],
        type: 'error',
      });
      console.log("uh oh" + errorInfo[i][1]);
    }
    return false;
  }
  function sweetSuccess() {
    document.getElementById("responseForm").submit();
    return true;
  }
var formRules = [
      @foreach($task->queue->questions as $question)
        @if($question->questiontype->type == 'numeric')
        "digits_only,{{ 'q'.$question->id }},{{ $question->title }} must be a number.",
        @endif
        @if(!empty($question->validation))
        "{{ $question->validation }}",
        @endif
      @endforeach
    ];

</script>
@endpush
