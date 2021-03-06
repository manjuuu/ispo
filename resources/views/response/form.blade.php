@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $form->title }}</div>
    <div class="panel-body">
      <div class="alert alert-danger" id="rsvErrors" style="display: none;"></div>
      {!! BootForm::open(['url' => 'response', 'id' => 'responseForm', 'onsubmit' => 'return rsv.validate(this, formRules)']) !!}
      @foreach($form->questions as $question)
        @includeIf('questiontype.'.$question->questiontype->type)
        <small class="form-text text-muted">{{$question->help}}</small>
      @endforeach
        <input type="hidden" name="_form" value="{{ encrypt($form->id) }}" />
        <div class="form-group"><div><input class="btn btn-link" name="_savestate" type="submit" value="Save >> Repeat">&nbsp;<input class="btn btn-link" name="_savestate" type="submit" value="Save >> New Form"> 
          <?php  if($form->mail==1) 
          echo"<input class='btn btn-link' name='_savestate' type='submit' value='Email >>'>"
        
          ?>

          <a href="{{ action('HomeController@index') }}" class="btn btn-link">Cancel</a></div></div>
      {!! BootForm::close() !!}
    </div>   
  </div>
@endsection
@push('scripts')
<script>
var formRules = [
      @foreach($form->questions as $question)
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
