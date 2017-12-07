@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Your Profile
		</div>

		<div class="panel-body">

		@include('includes.errors')

			{{Form::open(['method'=>'post','action'=>'ProfilesController@update','files'=>true])}}
			<div class="form-group">
				<label for="">Name</label>
				{{Form::text('name',$user->name,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Email</label>
				{{Form::email('email',$user->email,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<label for="">New Password</label>
				{{Form::password('password',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Confirm Password</label>
				{{Form::password('password_confirmation',['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Upload New Avater</label>
				{{Form::file('avater',null,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Facebook</label>
				{{Form::text('facebook',$user->profile->facebook,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Youtube</label>
				{{Form::text('youtube',$user->profile->youtube,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<label for="">About You</label>
				{{Form::textarea('about',$user->profile->about,['class'=>'form-control','rows'=>5])}}
			</div>

			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Update Profile',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
