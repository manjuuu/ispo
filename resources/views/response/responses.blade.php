<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 

    

    <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker3.min.css">
</head>
<body>


@extends('app')
@section('content')
@if (Session::get('updated'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ Session::get('updated') }}</strong>
  </div>
  @endif
    <div class="col-md-5">
<div class="panel panel-info">

    <div class="panel-heading">Edit the response request</div>
    <div class="panel-body">
        
@foreach($logs as $values)
 <form action="/updateresponse/<?php echo $values->id ?>" method="post"> 

        @foreach($log as $key=>$value)
    
            {{ csrf_field() }}
    <div class="form-group">   
        <label><?php echo ltrim($key, 'q') ?>:<!-- @foreach($join_logs as $join_log) {{$join_log->title}} <br> @endforeach --></label>
        <?php 

        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$value)) {
    echo " <input class='form-control' data-provide='datepicker' data-date-format='yyyy-mm-dd' name='$key' value='$value'>";
} else {
   echo "<input type='text' name='$key' value='$value' class='form-control'>";
}

        ?>
   
    
    </div>
    @endforeach 
    <input type="submit" name="" class="btn btn-success">
</form>

@endforeach
</div>
</div> 
</div>
<div class="col-md-7">
    <div class="panel panel-info">

    <div class="panel-heading">Note:Enter the question ID which is present in the left side of the response request in the search bar  to see the question to update</div>
    <div class="panel-body">
        

    <table class="table table-bordered" id="batchess">
    <thead>
      <tr>
        <th>ID</th>
        <th>Question</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach($qll_questions as $myquestion)
      <tr>
        <td>{{$myquestion->id}}</td>
        <td>{{$myquestion->title}}</td>
       
      </tr>
      @endforeach
      
    </tbody>
  </table> 
</div>
</div>
    </div><!-- 6 -->





   
    
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    

    
</script>
</body>
</html> 