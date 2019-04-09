@extends('app')

@section('content')
	@if (Session::get('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
	        <strong>{{ Session::get('success') }}</strong>
	</div>
	@endif
	@if (Session::get('error'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
	        <strong>{{ Session::get('error') }}</strong>
	</div>
	@endif
	<div class="panel panel-default">
    	<div class="panel-heading text-center"><strong>List Groups</strong></div>
    		<div class="panel-body">
    			<div class="row">
    				<div class="col-sm-12">
        				<a class="btn pull-right btn-success btn-right" href="{{ action('GroupController@create') }}">Add Group</a>
			        </div>
    			</div>
      			<div class="row">
			        <div class="col-sm-12">
			        	<table class="table table-hover table-condensed">
			        		<thead>
			        			<tr>
			        				<th>Group</th>
			        				<th>WIN ID</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			@foreach($groups as $group)
			        			<tr>
				        			<td>{{ $group->title }}</td>
			        				<td>
						        	@foreach($group->users as $user)
						        		@if ($user->admin != 1)
						        			{{ $user->username."," }}
						        		@endif
						        	@endforeach
						        	</td>
				        		</tr>
			        			@endforeach
			        		</tbody>
			        	</table>
			        	{{ $groups->links() }}
			        </div>
			    </div>
			</div>
	</div>
@endsection