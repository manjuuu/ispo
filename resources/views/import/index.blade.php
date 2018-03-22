@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Import</div>
        <div class="panel-body">
            <p>You can import records from any CSV to add work to a queue.</p>
            <p>To save an Excel file as a CSV, follow these instructions from <a href="https://support.office.com/en-us/article/import-or-export-text-txt-or-csv-files-5250ac4c-663c-47ce-937b-339e391393ba">Microsoft Support</a>.</p>
        </div>
      </div>
    </div>

      <div class="col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">Import CSV</div>
    <div class="panel-body">
    @if($queues->count() == 0)
        <div class="alert alert-danger">You have no import queues available.</div>
    @else
        <form method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Select Queue to add Records to</label>
            <select name="queue_id" class="form-control">
                @foreach($queues as $queue)
                    <option value="{{ $queue->id }}">{{ $queue->title }}</option>
                @endforeach
                </select>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name="csv_import" id="exampleInputFile">
            <p class="help-block">Ensure your file is saved as a Comma Seporated CSV file. Excel files will not import.</p>
        </div>
        <button type="submit" class="btn btn-default">Import</button>
        </form>
    @endif
    </div>
  </div>
</div>
@endsection
