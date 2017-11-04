@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $form->title }}</div>
    <div class="panel-body">
      {!! BootForm::open(['url' => 'response', 'name' => 'responseForm']) !!}
      @foreach($form->questions as $question)
        @includeIf('questiontype.'.$question->questiontype->type)
      @endforeach
        <input type="hidden" name="_form" value="{{ encrypt($form->id) }}" />
        <div class="form-group"><div><input class="btn btn-primary" name="_savestate" type="submit" value="Save >> Repeat">&nbsp;<input class="btn btn-info" name="_savestate" type="submit" value="Save >> New Form"></div></div>
      {!! BootForm::close() !!}
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
      })
    }
    return false;
  }
  $(function() {
  $("#responseForm").rsv({
    onCompleteHandler: sweetFormIssue,
    errorFieldClass: "errorField",
    rules: [
      @foreach($form->questions as $question)
        @if($question->questiontype->type == 'numeric')
        "digits_only,{{ 'q'.$question->id }},{{ $question->title }} must be a number.",
        @endif
        @if($question->validation !== '')
        "{{ $question->validation }}",
        @endif
      @endforeach
    ]
  });
});

</script>
@endpush
