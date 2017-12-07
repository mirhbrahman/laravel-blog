<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('app/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('app/css/blog-home.css')}}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    @include('includes.header')

    <section class="global-page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h2>{{$header}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <!-- Blog Entries Column -->
            <div class="col-md-8">
				<br>
				@yield('content')
			</div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <div class="card-body">
                        <div class="input-group">
                            <form class="input-group" action="{{route('post.search')}}" method="get">
                                <input type="text" name="q" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">Go!</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 style="background-color:#FFFFFF" class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @if (count($categories_all))
                                        @foreach ($categories_all as $category)
                                            <li><a href="{{route('post.category',$category->id)}}">{{$category->name}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>



            </div>

        	</div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; @if (isset($setting->site_name))
                {{$setting->site_name}}
            @endif 2017</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('app/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('app/vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('app/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

</body>

</html>
