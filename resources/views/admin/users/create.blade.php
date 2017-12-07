@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Create New User
		</div>

		<div class="panel-body">

		@include('includes.errors')

			{{Form::open(['method'=>'post','action'=>'UsersController@store'])}}
			<div class="form-group">
				<label for="">Name</label>
				{{Form::text('name',null,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Email</label>
				{{Form::email('email',null,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Add User',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
