

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.2.3.min.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script> 
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker3.min.css') }}" />
</head>
<body>


<div class="form-group">
 <!--  <label for="{{ 'q'.$question->id }}" class="control-label">{{ $question->title }}</label>
  <div><input class="form-control" id="from-datepicker" name="{{ 'q'.$question->id }}" type="date"></div> --> 

   <label for="{{ 'q'.$question->id }}" class="control-label">{{ $question->title }}</label>

  <input class="form-control"  data-provide="datepicker" name="{{ 'q'.$question->id }}" data-date-format="yyyy-mm-dd" id="from-datepicker" placeholder="Select date" required readonly='true'>
</div>  

</body>
</html>

