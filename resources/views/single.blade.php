@extends('layouts.frontend')

@section('content')
	<!-- Title -->
	<h3 class="blogpost-title">
		<a style="color:#555a5f" href="">{{ucfirst($post->title)}}</a>
	</h3>

	<!-- Author -->
	<p class="">
		by
		<span style="color:#02bdd5">{{ucfirst($post->user->name)}}</span>
	</p>

	<hr>

	<!-- Date/Time -->
	<p style="color:#9e9494">{{date('g:ia \o\n jS M Y', strtotime($post->created_at))}}</p>

	<hr>

	<!-- Preview Image -->
	<img class="card-img-top" src="{{$post->featured}}" alt="No image">

	<hr>

	<!-- Post Content -->
	{!!$post->content!!}

	<hr>


	<div class="">
		@foreach ($post->tags as $tag)
			<a href="#" ><span class="badge-my">{{$tag->tag}}</span></a>
		@endforeach
	</div>

	<ul class="pagination justify-content-center mb-4">
		@if ($next)
			<li class="page-item ">
				<a class="page-link" href="{{route('post.single',$next->slug)}}">&larr; Previous Post</a>
			</li>
		@endif
		@if ($prev)
			<li class="page-item">
				<a class="page-link" href="{{route('post.single',$prev->slug)}}">Next Post &rarr;</a>
			</li>
		@endif
	</ul>

	<div class="col-sm-12">
		<div class="container">
			<div class="span3 well">
				<center>
					<a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="{{asset($post->user->profile->avater)}}" name="aboutme" width="140" height="140" class="img-circle"></a>
					<h3>{{ucfirst($post->user->name)}}</h3>
					<em>click my face for more</em>
					<br>
					<br>
				</center>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							</div>
						<div class="modal-body">
							<center>
								<img src="{{asset($post->user->profile->avater)}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
								<h3 class="media-heading">{{ucfirst($post->user->name)}}</h3>
								<p>{{$post->user->profile->about}}</p>
								</center>
						
							</div>
							<div class="modal-footer">
								<center>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Comments Form -->
		@include('includes.disqus')


	@endsection
