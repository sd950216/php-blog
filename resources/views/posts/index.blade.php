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


@if(count($posts)>0)
@foreach($posts as $post)
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <img style="width: 40%;height:100% ;" src="{{$post->img_url}}" alt="image name">
            </div>

            <div class="col-md-8 col-sm-8">
                <div class="card-title">
                    <a href="/post/{{$post->id}}">
                        <h2>{{$post->title}}</h2>
                    </a>
                    <small class="post-meta">Posted by
                        <a href="#">{{$post->username}}</a>
                        on {{ $post->created_at->diffForHumans() }}
                        <a href="{{url('/delete', $post_id=$post->id) }}">✘</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{--<div>--}}
{{--    {{$posts->links('pagination::bootstrap-4')}}--}}
{{--</div>--}}

@else
<p>No Posts Available</p>
@endif
@endsection
