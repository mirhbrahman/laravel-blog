@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Trashed Post
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Action</th>
				</thead>

				<tbody>
					@if (count($posts))
						@foreach ($posts as $post)
							<tr>
								<td><img src="{{$post->featured}}" alt="No Image" width="90px" height="50px"></td>
								<td>{{$post->title}}</td>
								<td>
									<a href="{{route('post.restore',$post->id)}}" class="btn btn-xs btn-success"> Restore</a>
									<a href="{{route('post.kill',$post->id)}}" class="btn btn-xs btn-danger"> Delete</a></td>
								</tr>
							@endforeach
						@else
							<tr>
								<th colspan="3" class="text-center">No trashed posts</th>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	@endsection
