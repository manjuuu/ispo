<div class="form-group">
  <label for="{{ $question->id }}" class="control-label">{{ $question->title }}</label>
  <div><input class="form-control" id="{{ $question->id }}" name="{{ $question->id }}" type="number" min="0.01" step="0.01" max="999999"></div>
</div>
