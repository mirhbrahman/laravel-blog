<nav  class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
	<h2><a class="navbar-brand" style="text-transform: uppercase" href="{{route('index')}}">
        @if (isset($setting->site_name))
            {{$setting->site_name}}
        @endif
    </a></h2>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
	  <ul class="navbar-nav ml-auto">

		 @if (count($categories))
			 @foreach ($categories as $category)
				 <li class="nav-item active">
     			  <a class="nav-link" href="{{route('post.category',$category->id)}}"><b>{{$category->name}}</b></a>
     			</li>
			 @endforeach
		 @endif


	  </ul>
	</div>
  </div>
</nav>
