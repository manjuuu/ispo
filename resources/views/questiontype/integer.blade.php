<div class="form-group">
  <label for="{{ 'q'.$question->id }}" class="control-label">{{ $question->title }}</label>
  <div><input class="form-control" id="{{ 'q'.$question->id }}" name="{{ 'q'.$question->id }}" type="number" min="0" required=""></div>
</div>
