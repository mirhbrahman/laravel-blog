@extends('layouts.app')
@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			Edit Post
		</div>

		<div class="panel-body">

			@include('includes.errors')

			{{Form::model($post,['method'=>'put','action'=>['PostsController@update',$post->id],'files'=>true])}}
			<div class="form-group">
				<label for="">Title</label>
				{{Form::text('title',null,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Featured Image</label>
				{{Form::file('featured',null,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Select a Category</label>
				{{Form::select('category_id',[''=>'Choose']+$categories,null,['class'=>'form-control'])}}
			</div>
			<div class="form-group">
				<label for="">Select Tags</label>
			@if (isset($tags) && count($tags))
				@foreach ($tags as $tag)
					<div class="checkbox">
						<label for="">{{Form::checkbox('tags[]',$tag->id)}} {{$tag->tag}}</label>
					</div>
				@endforeach
			@endif
			</div>
			<div class="form-group">
				<label for="">Content</label>
				{{Form::textarea('content',null,['class'=>'form-control','id'=>'content'])}}
			</div>
			<div class="form-group">
				<div class="text-center">
					{{Form::submit('Update Post',['class'=>'btn btn-success'])}}
				</div>
			</div>
			{{Form::close()}}
		</div>
	</div>

@endsection
@section('styles')
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
	<script>
	    $(document).ready(function() {
	        $('#content').summernote();
	    });
	  </script>
@endsection
