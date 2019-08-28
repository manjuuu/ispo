@extends('app')
@section('content')
  <div class="panel panel-info">
    <div class="panel-heading">Users</div>
    <div class="panel-body">
    	<form class="user_access_form"  id="user_access_admin" method="post">
    	<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>User name(WIN ID)</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@foreach($users as $user)
      <tr>
      	
        <td><?php echo $user->name ?></td>
        <td><?php echo $user->username ?></td>
        <td><input type="checkbox" <?php if($user->admin =='1') {echo "checked";} else { echo '';} ?> id="admin<?php echo $user->id;?>" onclick="admin_check(<?php echo $user->id;?>)" value="<?php echo htmlentities($user->id)  ; ?>"></td>
    </tr>
       @endforeach
      
    </tbody>
  </table> 
  <input type="submit" name="submit" value="Submit" id="user_submit" class="btn btn-primary">
</form>

    	</div>
    </div>
    <script>
    	
    	

    		admin_ids = [];
  	function admin_check(id) {
      
     $('#user_submit').prop('disabled',false); 
      if($('#admin'+id).prop("checked") == true) {
          if(admin_ids.indexOf(id+':0') !== -1){
             var position = admin_ids.indexOf(id+':0');
             admin_ids[position] = id+':1';
             admin_ids.unique();
           } else {
             admin_ids.push(id+':1');
             admin_ids.unique();
         }
     } else {
         if(admin_ids.indexOf(id+':1') !== -1){
             var position = admin_ids.indexOf(id+':1');
             admin_ids[position] = id+':0';
             admin_ids.unique();
         } else {
             admin_ids.push(id+':0');
             admin_ids.unique();
         }
     }
  } 

    $('#user_access_admin').submit( function (e) {
	e.preventDefault();
  	alert(admin_ids);  

 
    });

    </script>

    @endsection