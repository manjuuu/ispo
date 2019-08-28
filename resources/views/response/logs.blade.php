@extends('app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Update diposes</div>
			<div class="panel-body"> 
				<?php    
				foreach ($logs as $value) {
					$datetime1 = new DateTime();
					$datetime2=new DateTime($value->created_at);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%y years %m months');
					// /echo $elapsed;
				}
?> 
					@foreach ($logs as $value) 
					<?php $datetime1 = new DateTime();
					$datetime2=new DateTime($value->created_at);
					$interval = $datetime1->diff($datetime2);
					$elapsed = $interval->format('%y years %m months');
					
?>

				<!-- <?php echo $elapsed; ?> -->
					@endforeach





@foreach(json_decode($log) as $key=>$value)
{{$value}}
@endforeach

<a href="/exporting" class="btn btn-success">export</a>

<!-- <?php 
$json = '{"1":"a","2":"b","3":"c","4":"d","5":"e"}';
 $obj = json_decode($json, TRUE);

foreach($obj as $key => $value) 
{
echo 'Your key is: '.$key.' and the value of the key is:'.$value;
}
?> -->

</div>
</div>

@endsection