@extends('app')

@section('content')
<div class="panel panel-info">
	<div class="panel-heading">All groups</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-4">

				<label>Select Group</label>
				<select class="group_id form-control" id="sel_groupid">
					<option value='0'>-- Select Form Group --</option>
					@foreach($getgroupid as $value)
					<option value="<?php echo $value->id ?>">{{$value->title}}</option>
					@endforeach
				</select>
			</div>

			<div class="col-md-4" id="form_sel" style="display: none">
				<label>Select Form</label>
				<select id='sel_form' name='sel_emp' class="myclass form-control">
					<option value='0'>-- Select Form --</option>
				</select> 
			</div><!-- 6 -->

			<div class="col-md-4 mypanel" style="display: none">
				<label>Select Created Date</label>
				<select id='sel_date' name='sel_emp' class="mydate form-control">
					<option value='0'>-- Select Date --</option>
				</select> 
			</div><!-- 4 -->
		</div><!-- r -->
	</div>
</div>   

<div class="panel panel-info" style="width: auto">
	<div class="panel-heading">All froms and responses</div>
	<div class="panel-body">
<table class="table table-bordered" id="table_authorId">
    <thead>
      <tr>
      	<th>Id</th>
        <th>User</th>
        <th>Form</th>
        <th>Reponse request</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="table_data">
	</tbody>
  </table>
  </div> 
</div>
<script>
$(document).ready(function()
 {
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


		
$('.myclass').change(function(e)
{
	$('#form_sel').show();
	$('.mypanel ').show();
	var id=$(this).val();
	//alert(id);
	e.preventDefault();
	$.ajax({
		url: 'getDateforFormid/'+id,
		type: 'get',
		success:function (data) {
		if(data){
	    $('#sel_date').empty();
	     $.each(data, function(key, value){
		$('#sel_date').append('<option value="'+ value.id +'" id="myid">' + value.created_at + '</option>');
		});
	      }else{
	     $('#sel_date').empty();
	      }
		}
});
});  


	$('.mydate').change(function(e)
	{
		var id=$(this).val();
		e.preventDefault();
		$.ajax({
		url: 'getResponsefordate/'+id,
		type: 'get',
		success:function (data) {
		if(data){
		$('#table_data').empty();
		$.each(data, function(key, value){
		$('#table_data').append("<tr><td>"+value.id+"</td><td>"+value.username+"</td><td>"+value.title+"</td> <td>"+value.response_request+"</td> <td><a href='/edit_responses/"+value.id+"/"+value.form_id+"/"+value.user_id+"' class='btn btn-primary'>edit</a></td> </tr>");
		
		/*$('#table_data').append("<tr><td>"+value.username+"</td><td>"+value.title+"</td> <td>"+value.response_request+"</td> <td><a href='/edit_responses/"+value.id+"/"+value.form_id+"/"+value.user_id+"' class='btn btn-primary'>edit</a></td> </tr>");*/

		});
		   }else{
		      $('#table_data').empty();
		    }
		}
});
});

});




</script>

@endsection