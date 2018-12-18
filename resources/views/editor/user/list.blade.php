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
    	<div class="panel-heading text-center"><strong>List Users</strong></div>
    		<div class="panel-body">
    			<div class="row">
    				<div class="col-sm-12">
        				<a class="btn pull-right btn-success btn-right" href="{{ action('UserController@create') }}">Add User</a>
			        </div>
    			</div>
      			<div class="row">
			        <div class="col-sm-12">
			        	<table class="table table-hover table-condensed">
			        		<thead>
			        			<tr>
			        				<th>WIN ID</th>
			        				<th>Name</th>
			        				<th>Group</th>
			        			</tr>
			        		</thead>
			        		<tbody>
			        			@foreach($users as $user)
			        				<tr>
				        				<td>{{ $user->username }}</td>
				        				<td>{{ $user->name }}</td>
				        				<td>
				        					@foreach($user->groups as $group)
					        					<table>
					        						<tr>
					        							<td>{{ $group->title."," }}</td>
					        							@if ($user->groups->count() > 1)
						        							<td>
						        								<a href="{{ action('UserController@unassign', [$user->id, $group->id]) }}" class="glyphicon glyphicon-trash"></a>
						        								<input type="hidden" name="_method" value="DELETE" />
						        							</td>
						        						@endif	
					        						</tr>
					        					</table>
				        					@endforeach	
				        				</td>
				        			</tr>	
			        			@endforeach
			        		</tbody>
			        	</table>
			        	{{ $users->links() }}
			        </div>
			    </div>
			</div>
	</div>
@endsection