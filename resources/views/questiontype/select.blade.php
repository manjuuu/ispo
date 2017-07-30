@if($question->optiongroup->options->count() > 0)
  {{ Form::label($question->id, $question->title) }}
  {{ Form::select($question->id, $question->optiongroup->options->pluck('title')) }}
@else
  <p>There was a problem with this question. No options were available for the Option Group.</p>
@endif
