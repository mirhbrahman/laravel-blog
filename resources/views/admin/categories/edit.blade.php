@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Category
		</div>

		<div class="panel-body">

			@include('includes.errors')

			{{Form::model($category,['method'=>'Patch','action'=>['CategoriesController@update',$category->id]])}}
			<div class="form-group">
				<label for="">Name</label>
				{{Form::text('name',null,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Update Category',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
