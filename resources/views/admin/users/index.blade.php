@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Users
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Name</th>
					<th>Permissions</th>
					<th>Action</th>
				</thead>

				<tbody>
					@if (count($users))
						@foreach ($users as $user)
							<tr>
								<td><img src="{{asset($user->profile->avater)}}" alt="No Image" width="60px" height="60px" style="border-radius:50%"></td>
								<td>{{$user->name}}</td>
								<td>
									@if ($user->admin)
										<a href="{{route('user.not.admin',$user->id)}}" class="btn btn-xs btn-danger">Remove Admin</a>
									@else
										<a href="{{route('user.admin',$user->id)}}" class="btn btn-xs btn-success">Make Admin</a>
									@endif
								</td>
								<td>
										@if (Auth::id() !== $user->id)
											<a href="{{route('user.delete',$user->id)}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
											@else
												It's You
										@endif
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="3" class="text-center">No users</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection
