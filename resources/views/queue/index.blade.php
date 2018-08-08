@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Instructions</div>
        <div class="panel-body">
            <p>Queues are push queues where users can process work items that are pending to be completed with an action in the system.</p>
            <p>To get the next task in a queue, click "Next Task" to get the next task in order that it was created in the application.</p>
            <p>If there is no work in a queue, you will not be able to enter the queue.</p>
        </div>
      </div>
    </div>

      <div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">Available Queues</div>
    <div class="panel-body">
      @if($queues->count() == 0)
        <div class="alert alert-danger">You have no queues available. Please speak with your line manager.</div>
      @endif

      <table class="table">
        <thead>
          <tr>
            <th>Queue</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($queues as $queue)
        <tr>
          <td><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> {{ $queue->title }} ({{ $queue->group->title or 'Unkown Group'}})
          <br/><span class="label label-primary">{{ number_format($queue->tasks()->has('response', '<', 1)->count()) }} tasks</span>
                 <span class="label label-danger">{{ number_format($queue->tasks()->has('response', '<', 1)->has('locks', '>', 0)->count()) }} locked tasks</span>
</td>
          <td>
                                  <a class="btn btn-sm btn-default" href="{{ action('QueueController@show', [$queue->id]) }}">Next Task</a>
          </td>
          </tr>
        @endforeach
        </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
