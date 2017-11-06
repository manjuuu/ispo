@extends('app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Update Question on Form: {{ $form->title }}</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-sm-4">
          {!! BootForm::open(['url' => action('QuestionController@update', [$question->id])]) !!}
            {!! BootForm::text('title', 'Question Name', $question->title) !!}
            {!! BootForm::select('question_type_id', 'Question Type', $question_types->pluck('title', 'id'), $question->question_type_id) !!}
            {!! BootForm::select('option_group_id', 'Option Group (if applicable)', $option_groups->pluck('title', 'id'), $question->option_group_id) !!}
            <button type="submit" class="btn btn-default">Update</button>
            <input type="hidden" name="_method" value="PUT" />
          {!! BootForm::close() !!}
          <br/>
          {!! BootForm::open(['url' => action('QuestionController@destroy', [$question->id])]) !!}
            <button type="submit" class="btn btn-danger">Delete Question</button>
            <input type="hidden" name="_method" value="DELETE" />
          {!! BootForm::close() !!}
        </div>
        <div class="col-sm-8">
          <div class="alert alert-danger">Creating this question will add it to the form instantly for users.</div>
          <p>The following question types are available.</p>
          <ul>
            <li><b>Text</b> - Provides a timer that starts counting when the page is opened.</li>
            <li><b>Text Area</b> - Provides a multiline text area for large text entry.</li>
            <li><b>Typeahead</b> - Provides a text box that allows users to start typing and see predefined values (requires an Option Group).</li>
            <li><b>Select Box</b> - Provides a select box (requires an Option Group).</li>
            <li><b>Select Box (Dependant)</b> - Provides a select box with two levels of values (requires an Option Group).</li>
            <li><b>Select Box (Other)</b> - Provides a select box that if there is an Other item in the option group provides a text box for other values (requires an Option Group).</li>
            <li><b>Radioboxes</b> - Provides radio boxes that can have single selections (requires an Option Group).</li>
            <li><b>Checkboxes</b> - Provides checkboxes that can have multi selections (requires an Option Group).</li>
            <li><b>Integer</b> - Provides a text box that allows 0 to 9 values.</li>
            <li><b>Money</b> - Provides a text box that allows $, ., and 0 to 9 values.</li>
            <li><b>Numeric</b> - Provides a text box that allows ., and 0 to 9 values.</li>
            <li><b>Password</b> - Provides a text box that hides text but stores it in plain text.</li>
            <li><b>Time</b> - Provides a time select box.</li>
            <li><b>Date</b> - Provides a date select box.</li>
            <li><b>Auto Timer</b> - Provides a timer that starts counting when the page is opened.</li>
            <li><b>Timer</b> - Provides a timer that can be manually controlled.</li>
          </ul>

        </div>
      </div>
    </div>
  </div>
@endsection
