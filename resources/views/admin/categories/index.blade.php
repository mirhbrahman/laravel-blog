@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Categories
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>Category Name</th>
					<th>Action</th>
				</thead>

				<tbody>
					@if (count($categories))
						@foreach ($categories as $category)
							<tr>
								<td>{{$category->name}}</td>
								<td><a href="{{route('category.edit',$category->id)}}" class="btn btn-xs btn-info"> Edit</a> <a href="{{route('category.delete',$category->id)}}" class="btn btn-xs btn-danger"> Delete</a></td>
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="2" class="text-center">No categories yet</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection
