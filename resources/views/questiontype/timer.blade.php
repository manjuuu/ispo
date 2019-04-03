<div class="form-group">
    <label for="q{{ 'q'.$question->id }}" class="control-label">{{ $question->title }}</label>
    <input type="button" id="{{ 'q'.$question->id }}btn" onclick="{{ 'q'.$question->id }}toggle()" value="Start" />
    <div><input type="text" class="form-control" id="{{ 'q'.$question->id }}" name="{{ 'q'.$question->id }}" readonly></div>
  </div>



  @push('scripts')
  <script>
  var {{ 'q'.$question->id }}vct=0,
  {{ 'q'.$question->id }}vintv=false,
  {{ 'q'.$question->id }}vdisp = document.getElementById('{{ 'q'.$question->id }}'),
  {{ 'q'.$question->id }}vbtn = document.getElementById('{{ 'q'.$question->id }}btn');   

    function {{ 'q'.$question->id }}display_count() {
      {{ 'q'.$question->id }}vdisp.value = {{ 'q'.$question->id }}vct;
    }

    function {{ 'q'.$question->id }}count() {
      {{ 'q'.$question->id }}vct={{ 'q'.$question->id }}vct+1;
      {{ 'q'.$question->id }}display_count();
    }

    function {{ 'q'.$question->id }}toggle() {
       if(!{{ 'q'.$question->id }}vintv) {
        {{ 'q'.$question->id }}vintv = setInterval({{ 'q'.$question->id }}count,1000);
        {{ 'q'.$question->id }}vbtn.value = "Stop"; }
       else {
          clearInterval({{ 'q'.$question->id }}vintv);
          {{ 'q'.$question->id }}vintv = false;
          {{ 'q'.$question->id }}vbtn.value = "Start";
       }
    }
  </script>
@endpush
