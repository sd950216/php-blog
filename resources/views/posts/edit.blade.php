@extends('master.master')
@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{$post->img_url}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Edit Post</h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>



<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form method="POST" action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}" />
                </div>
                <div class="form-group">
                    <input hidden="" type="text" class="form-control" name="username" value="{{Auth::user()->name}}" />
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle:</label>
                    <input type="text" class="form-control" name="subtitle" value="{{$post->subtitle}}" />
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" name="image" />
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name="body" > {{$post->body}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>







@endsection
