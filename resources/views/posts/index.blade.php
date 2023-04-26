@extends('master.master')

@section('content')





    <!-- Page Header -->
    <header class="masthead" style="background-image: url('https://images.unsplash.com/photo-1470092306007-055b6797ca72?ixlib=rb-1.2.1&auto=format&fit=crop&w=668&')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Posts</h1>
                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @if(count($posts)>0)
                    @foreach($posts as $post)
                        <div class="post-preview">
                    <a href="{{ url('post', $post_id=$post->id) }}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{$post->subtitle}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{$post->username}}</a>
                        on {{ $post->created_at->diffForHumans() }}
                        <a href="{{url('delete', $post->id) }}">✘</a>

                    </p>
                </div>
                <hr>
                    @endforeach

            </div>
            @else

                <p>No Posts Available</p>
            @endif

        </div>
        @guest
            @if (Route::has('login'))
            @endif
        @else
            <!-- New Post -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="{{url('create')}}">Create New Post</a>
            </div>
        @endguest

    </div>

    <hr>




@endsection
