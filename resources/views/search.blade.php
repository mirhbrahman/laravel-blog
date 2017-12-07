@extends('layouts.frontend')

@section('content')
	<div class="col-md-12" style="padding:0">
		@if (count($posts))
	        @foreach ($posts as $post)
	           <div class="col-md-6" style="float:left;padding-left:0">
				   <div class="card mb-4">
   	                <img class="card-img-top" src="{{$post->featured}}" alt="No image">
   	                <div class="card-body">
   	                    <h3 class="blogpost-title">
   	                        <a style="color:#555a5f" href="">{{ucfirst($post->title)}}</a>
   	                    </h3>
   	                    <div class="blog-meta">
   	                        <span>{{$post->created_at->toFormattedDateString()}}</span>
   	                        <span>by Admin, </span>
   	                        <span><a href="" style="color:gray"> {{$post->category->name}}</a></span>
   	                    </div>

   	                    <a href="{{route('post.single',$post->slug)}}" class="btn btn-sm btn-info">Read More &rarr;</a>
   	                </div>

   	            </div>

	           </div>
	        @endforeach
			@else
				<h3>No Post Found!!!</h3>
	    @endif
	</div>
@endsection
