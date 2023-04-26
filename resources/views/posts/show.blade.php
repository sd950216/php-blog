@extends('master.master')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{$post->img_url}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{$post->title}}</h1>
                        <h2 class="subheading">{{$post->subtitle}}</h2>
                        <span class="meta">Posted by
              <a href="#">{{$post->username}}</a>
              on {{ $post->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! $post->body !!}
                    <hr>
                    <div class="clearfix">
                        <a class="btn btn-primary float-right" href="{{url('/post/edit',$post->id)}}">Edit Post</a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>
@endsection
