@extends('master.master')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('https://images.unsplash.com/photo-1531592937781-344ad608fabf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Register</h1>
                        <span class="subheading">Start Contributing to the Blog!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','method'=>'post']) !!}
                <div class="form-group">
                    {{Form::label('username','Username')}}
                    {{Form::text('username','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('password','Password')}}
                    {{Form::text('password','',['class'=>'form-control'])}}
                </div>
                <div class="form-group" style="margin-top: 2%;">
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}            </div>
        </div>
    </div>

@endsection
