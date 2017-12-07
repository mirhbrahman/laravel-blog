@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Tag
		</div>

		<div class="panel-body">

			@include('includes.errors')

			{{Form::model($tag,['method'=>'Patch','action'=>['TagsController@update',$tag->id]])}}
			<div class="form-group">
				<label for="">Tag Name</label>
				{{Form::text('tag',null,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Update tag',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
