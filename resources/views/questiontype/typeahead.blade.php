{!! BootForm::text('q'.$question->id, $question->title) !!}
@push('scripts')
  <script>
  $( function() {
    var {{ 'q'.$question->id }}TypeAhead = [
        @foreach($question->optiongroup->options->pluck('title', 'title') as $title)
            "{{ $title }}",
        @endforeach
    ];
    $( "#{{ 'q'.$question->id }}" ).autocomplete({
      source: {{ 'q'.$question->id }}TypeAhead
    });
  } );
  </script>
@endpush