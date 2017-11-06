@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Edit {{ $form->title }}</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4">
          {!! BootForm::open(['url' => action('FormController@update', [$form->id])]) !!}
            {!! BootForm::text('title', 'Form Name', $form->title) !!}
            <div class="form-group"><label for="" class="control-label">Form Availablity</label><div>
              <div class="radio"><label><input name="active" type="radio" value="1" @if($form->active == 1) checked @endif>Active</label></div>
              <div class="radio"><label><input name="active" type="radio" value="0" @if($form->active == 0) checked @endif>Disable</label></div>
            </div>
            </div>
            <div class="form-group "><label for="title" class="control-label">Group</label><div>{{ $form->group->title }}</div></div>
            <button type="submit" class="btn btn-default">Update</button>
            <input type="hidden" name="_method" value="PUT" />
          {!! BootForm::close() !!}
          <br/>
          {!! BootForm::open(['url' => action('FormController@destroy', [$form->id])]) !!}
            <button type="submit" class="btn btn-danger">Delete Form</button>
            <input type="hidden" name="_method" value="DELETE" />
          {!! BootForm::close() !!}

        </div>
        <div class="col-sm-8">
          <ul>
            @foreach($form->questions as $question)
              <li><b><a href="{{ action('QuestionController@edit', [$question->id]) }}">{{ $question->title }}</a></b> ({{ $question->questiontype->title }})</li>
            @endforeach
            @if(count($form->questions) == 0)
              <li>There are no questions on this form.</li>
            @endif
          </ul>
          <p><a class="btn btn-success" href="{{ action('QuestionController@create', ['form_id' => $form->id]) }}">New Question</a></p>
        </div>
      </div>
    </div>
  </div>
@endsection
