@extends('layouts.master')
@section('title')
    Edit Tag
@endsection
@section('content')
    {{ Form::model($tag, ['route'=> ['tags.update', $tag->id], 'method'=> 'PUT']) }}
    <div class="form-group">
        {{ form::label('name', 'Title:') }}
        {{ Form::text('name', null, ['class'=> 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Edit Tag', ['class'=> 'btn btn-success']) }}

    </div>
    {{ Form::close() }}
@endsection