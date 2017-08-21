  <div class="form-group">
    <label for="{{ $question->id }}" class="control-label">{{ $question->title }}</label>
    <button type="button" id="start-{{ $question->id }}">Start</button>
    <button type="button" id="stop-{{ $question->id }}">Stop</button>
    <button type="button" id="reset-{{ $question->id }}">Reset</button>
    <div><input type="text" class="form-control" id="{{ $question->id }}" name="{{ $question->id }}" disabled></div>
  </div>



@push('scripts')
  <script>
  window.onload = function () {
    var TimerActiveTime = 0;
    var addTimerActiveTime = document.getElementById('{{ $question->id }}')
    var intvl;
    var tSt = document.getElementById('start-{{ $question->id }}');
    var tSp = document.getElementById('stop-{{ $question->id }}');
    var tRe = document.getElementById('reset-{{ $question->id }}');

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
