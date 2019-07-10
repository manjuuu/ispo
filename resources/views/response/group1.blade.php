@extends('app')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading">All groups</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">

				<label>Select Group</label>
				<select class="group_id form-control" id="sel_groupid">
					<option value='0'>-- Select Form Group --</option>
					@foreach($getgroupid as $value)
					<option value="<?php echo $value->id ?>">{{$value->title}}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-6" id="form_sel" style="display: none">
				<label>Select Form</label>
				<select id='sel_form' name='sel_emp' class="myclass form-control">
					<option value='0'>-- Select Form --</option>
				</select> 

			</div><!-- 6 -->
		</div><!-- r -->
	</div>
</div>   


<div class="panel panel-info mypanel" style="display: none">
	<div class="panel-heading">Response for a form</div>
	<div class="panel-body">
		<form>

			<label>Response request</label>
			<input id="respons_id1" type="text" class="form-control">
			<br>
			<label>Response attributes</label>
			<input id="respons_id2" type="text" class="form-control">
			<br>
			<label>Created date</label>
			<input id="respons_id3" type="text" class="form-control">
			<br>

			<input type="submit" name="" class="btn btn-success" value="update">

		</form>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#sel_groupid').change(function(e){
			$('#form_sel').show();
			var id = $(this).val();
         //alert(id);
         // AJAX request 
         e.preventDefault();
         $.ajax({
         	url: 'getFormsforId/'+id,
         	type: 'get',
         	success:function (data) {
         		if(data){
         			$('#sel_form').empty();
         			$.each(data, function(key, value){

         				$('#sel_form').append('<option value="'+ value.id +'" id="myid">' + value.title + '</option>');
						});
         		}else{
         			$('#sel_form').empty();
         		}
         	}
         });
     });   


		
	$('.myclass').change(function(e){
	$('#form_sel').show();
	$('.mypanel ').show();
	var id=$(this).val();
//alert(id);
e.preventDefault();
$.ajax({
	url: 'getResponseforFormid/'+id,
	type: 'get',
	success:function (data) {
		if(data){
			$('#respons_id1').val("");
			$('#respons_id2').val("");
			$('#respons_id3').val("");
			$.each(data, function(key, value){
				$('#respons_id1').val(value.response_request);
				$('#respons_id2').val(value.response_attributes);
				$('#respons_id3').val(value.created_at);

			});
		} else {
			$('#respons_id1').val("");
			$('#respons_id2').val("");
			$('#respons_id3').val("");
		}

	}
});
});

	});





</script>

@endsection