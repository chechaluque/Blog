@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class'=>'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password',['class'=>'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('remember', 'Remember Me:') }}
                {{ Form::checkbox('remember') }}
            </div>
                {{ Form::submit('Login', ['class'=> 'btn btn-primary btn-block']) }}

            <div class="form-group">
                <p><a href="{{ url('password/reset') }}">Forgot My Password?</a></p>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection