  <div class="form-group">
    <label for="{{ 'q'.$question->id }}" class="control-label">{{ $question->title }}</label>
    <button type="button" id="start-{{ 'q'.$question->id }}">Start</button>
    <button type="button" id="stop-{{ 'q'.$question->id }}">Stop</button>
    <button type="button" id="reset-{{ 'q'.$question->id }}">Reset</button>
    <div><input type="text" class="form-control" id="{{ 'q'.$question->id }}" name="{{ 'q'.$question->id }}" readonly></div>
  </div>



@push('scripts')
  <script>
  window.onload = function () {
    var {{ 'q'.$question->id }}TimerActiveTime = 0;
    var {{ 'q'.$question->id }}addTimerActiveTime = document.getElementById('{{ 'q'.$question->id }}')
    var {{ 'q'.$question->id }}intvl;
    var {{ 'q'.$question->id }}tSt = document.getElementById('start-{{ 'q'.$question->id }}');
    var {{ 'q'.$question->id }}tSp = document.getElementById('stop-{{ 'q'.$question->id }}');
    var {{ 'q'.$question->id }}tRe = document.getElementById('reset-{{ 'q'.$question->id }}');

    {{ 'q'.$question->id }}tSt.onclick = function() {
       clearInterval({{ 'q'.$question->id }}intvl);
       intvl = setInterval(start{{ 'q'.$question->id }}Timer, 1000);
    }
    {{ 'q'.$question->id }}tSp.onclick = function() {
         clearInterval({{ 'q'.$question->id }}intvl);
    }

    {{ 'q'.$question->id }}tRe.onclick = function() {
      clearInterval({{ 'q'.$question->id }}intvl);
    	{{ 'q'.$question->id }}TimerActiveTime = 0;
    	{{ 'q'.$question->id }}addTimerActiveTime.value = {{ 'q'.$question->id }}TimerActiveTime;
    }

    function start{{ 'q'.$question->id }}Timer () {
      {{ 'q'.$question->id }}TimerActiveTime++;
      {{ 'q'.$question->id }}addTimerActiveTime.value = {{ 'q'.$question->id }}TimerActiveTime;
    }


  }</script>
@endpush
