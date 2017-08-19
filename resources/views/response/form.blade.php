@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $form->title }}</div>
    <div class="panel-body">
      {!! BootForm::open(['url' => 'response']) !!}
      @foreach($form->questions as $question)
        @if($question->questiontype->type == 'text')
          @include('questiontype.text')
        @elseif($question->questiontype->type == 'textarea')
          @include('questiontype.textarea')
        @elseif($question->questiontype->type == 'select')
          @include('questiontype.select')
        @elseif($question->questiontype->type == 'radio')
          @include('questiontype.radio')
        @elseif($question->questiontype->type == 'check')
          @include('questiontype.check')
        @elseif($question->questiontype->type == 'date')
          @include('questiontype.date')
        @elseif($question->questiontype->type == 'time')
          @include('questiontype.time')
        @elseif($question->questiontype->type == 'money')
          @include('questiontype.money')
        @elseif($question->questiontype->type == 'numeric')
          @include('questiontype.numeric')
        @elseif($question->questiontype->type == 'integer')
          @include('questiontype.integer')
        @elseif($question->questiontype->type == 'password')
          @include('questiontype.password')
        @elseif($question->questiontype->type == 'selectdependant')
          @include('questiontype.selectdependant')
        @else
          <p>Question type not found for Question ID: {{ $question->id }}</p>
        @endif
      @endforeach
        <input type="hidden" name="_form" value="{{ encrypt($form->id) }}" />
        <div class="form-group"><div><input class="btn btn-primary" name="_savestate" type="submit" value="Save >> Repeat">&nbsp;<input class="btn btn-info" name="_savestate" type="submit" value="Save >> New Form"></div></div>
      {!! BootForm::close() !!}
    </div>
  </div>
@endsection
