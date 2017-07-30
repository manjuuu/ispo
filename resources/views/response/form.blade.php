@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">{{ $form->title }}</div>
    <div class="panel-body">

      {{ $form }}
      {!! Form::open(['url' => 'response']) !!}
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
        @else
          <p>Question type not found for Question ID: {{ $question->id }}</p>
        @endif
      @endforeach
        {{ Form::submit('Process >>') }}
      {!! Form::close() !!}


    </div>
  </div>
@endsection
