@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Blog Settings
		</div>

		<div class="panel-body">

		@include('includes.errors')

			{{Form::open(['method'=>'post','action'=>'SettingsController@update'])}}
			<div class="form-group">
				<label for="">Site Name</label>
				{{Form::text('site_name',$setting->site_name,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<label for="">Contact Number</label>
				{{Form::number('contact_number',$setting->contact_number,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<label for="">Contact Email</label>
				{{Form::email('contact_email',$setting->contact_email,['class'=>'form-control'])}}
			</div>

			<div class="form-group">
				<label for="">Address</label>
				{{Form::text('address',$setting->address,['class'=>'form-control'])}}
			</div>


			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Update Site Settings',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
