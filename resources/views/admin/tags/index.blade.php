@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Tags
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Tag Name</th>
					<th>Action</th>
				</thead>

				<tbody>
					@if (count($tags))
						@foreach ($tags as $tag)
							<tr>
								<td>{{$tag->tag}}</td>
								<td><a href="{{route('tag.edit',$tag->id)}}" class="btn btn-xs btn-info"> Edit</a> <a href="{{route('tag.delete',$tag->id)}}" class="btn btn-xs btn-danger"> Delete</a></td>
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="2" class="text-center">No tags yet</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection
