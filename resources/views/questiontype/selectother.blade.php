@if($question->optiongroup->options->count() > 0)
  {!! BootForm::select('q'.$question->id, $question->title, $question->optiongroup->options->sortBy('sort')->pluck('title', 'title')) !!}
  <div id="{{ 'q'.$question->id }}Other"></div>
  <br/>
@else
  <p>There was a problem with this question. No options were available for the Option Group.</p>
@endif
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#{{ 'q'.$question->id }}").change(function () {
                $("#{{ 'q'.$question->id }}Other").empty();
                var selectedVal = this.value;
                if (selectedVal == "Other") {
                        var {{ 'q'.$question->id }}OtherDiv = $(document.createElement('div')).attr("id", 'divOther');
                        {{ 'q'.$question->id }}OtherDiv.after().html('<input type="text" class="form-control" name="{{ 'q'.$question->id }}">');
                        {{ 'q'.$question->id }}OtherDiv.appendTo("#{{ 'q'.$question->id }}Other");
                }
            });
        });
    </script>
@endpush