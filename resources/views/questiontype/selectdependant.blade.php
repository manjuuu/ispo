@if($question->optiongroup->options->count() > 0)
  <div class="form-group">
    <label for="{{ $question->id }}" class="control-label">{{ $question->title }}</label>
    <div><select class="form-control" id="{{ $question->id }}" name="{{ $question->id }}-ignore"></select></div>
    <div><select class="form-control" id="second-{{ $question->id }}" name="{{ $question->id }}"></select></div>
  </div>

@else
  <p>There was a problem with this question. No options were available for the Option Group.</p>
@endif

@push('scripts')
  <script>
  var items = [
{
    name: '- Select an Option -',
    subitems: []
}
@foreach($question->optiongroup->options as $option)
@if(empty($option->parent_id))
,{name: '{{$option->title}}',
    subitems: [
      @foreach($option->children as $child)
        {name: '{{ $child->title }}'},
      @endforeach
    ]
}
@endif
@endforeach
];

$(function(){
  var temp = {};
  $.each(items, function(){
      $("<option />")
      .html(this.name)
      .appendTo("#{{ $question->id }}");
      temp[this.name] = this.subitems;
  });
  $("#{{ $question->id }}").change(function(){
      var name = $(this).val();
      var menu = $("#second-{{ $question->id }}");
      menu.empty();
      $.each(temp[name], function(){
          $("<option />")
          .html(this.name)
          .appendTo(menu);
      });
  }).change();
});
</script>
@endpush
