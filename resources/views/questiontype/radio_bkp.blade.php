@if($question->optiongroup->options->count() > 0)
  {!! BootForm::radios('q'.$question->id, $question->title, $question->optiongroup->options->sortBy('sort')->pluck('title', 'title')) !!}
@else
  <p>There was a problem with this question. No options were available for the Option Group.</p>
@endif
