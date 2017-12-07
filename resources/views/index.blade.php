@extends('layouts.frontend')

@section('content')
    <!-- Blog Post -->
    @if (isset($posts) && count($posts))
        @foreach ($posts as $post)
            <div class="card mb-4">
                <img class="card-img-top" src="{{$post->featured}}" alt="No image">
                <div class="card-body">
                    <h3 class="blogpost-title">
                        <a style="color:#555a5f" href="">{{ucfirst($post->title)}}</a>
                    </h3>
                    <div class="blog-meta">
                        <span>{{$post->created_at->toFormattedDateString()}}</span>
                        <span>by {{ucfirst($post->user->name)}}, </span>
                        <span><a href="{{route('post.category',$post->category->id)}}" style="color:gray"> {{$post->category->name}}</a></span>
                    </div>
                    <p style="color:gray">
                        {{str_limit(strip_tags($post->content),350)}}
                    </p>
                    <a href="{{route('post.single',$post->slug)}}" class="btn btn-sm btn-info">Read More &rarr;</a>
                </div>

            </div>

        @endforeach
    @endif

    <ul class="pagination justify-content-center mb-4">
        {{$posts->links()}}
    </ul>
@endsection
