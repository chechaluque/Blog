@extends('layouts.master')
@section('title')
    Edit Comment
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            {{ Form::model($comment, ['route'=> ['comments.update', $comment->id], 'method'=> 'PUT']) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class'=> 'form-control', 'disabled'=> 'disabled']) }}
                </div>

            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class'=> 'form-control', 'disabled'=> 'disabled']) }}
            </div>

            <div class="form-group">
                {{ Form::label('comment', 'Comment:') }}
                {{ Form::textarea('comment', null, ['class'=> 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Edit Comment', ['class'=> 'btn btn-success btn-block']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection