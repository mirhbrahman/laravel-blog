@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Create New Tag
		</div>

		<div class="panel-body">

		@include('includes.errors')

			{{Form::open(['method'=>'post','action'=>'TagsController@store'])}}
			<div class="form-group">
				<label for="">Tag Name</label>
				{{Form::text('tag',null,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Store tag',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
