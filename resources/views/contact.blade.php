@extends('master.master')
@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('img/contact-bg.jpg')}}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store','method'=>'post']) !!}
                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::text('email','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('phone','Phone Number')}}
                    {{Form::text('phone','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('message','Message')}}
                    {{Form::textarea('message','',['class'=>'form-control'])}}
                </div>
                <div class="form-group" style="margin-top: 2%;">
                    {{Form::submit('submit',['class'=>'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <hr>

@endsection
