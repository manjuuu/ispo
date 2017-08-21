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
    var TimerActiveTime = 0;
    var addTimerActiveTime = document.getElementById('{{ 'q'.$question->id }}')
    var intvl;
    var tSt = document.getElementById('start-{{ 'q'.$question->id }}');
    var tSp = document.getElementById('stop-{{ 'q'.$question->id }}');
    var tRe = document.getElementById('reset-{{ 'q'.$question->id }}');

    tSt.onclick = function() {
       clearInterval(intvl);
       intvl = setInterval(startTimer, 1000);
    }
    tSp.onclick = function() {
         clearInterval(intvl);
    }

    tRe.onclick = function() {
      clearInterval(intvl);
    	TimerActiveTime = 0;
    	addTimerActiveTime.value = TimerActiveTime;
    }

    function startTimer () {
      TimerActiveTime++;
      addTimerActiveTime.value = TimerActiveTime;
    }


  }</script>
@endpush
