@extends('layouts.master')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($post->image)
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1">
                        <a href="#" class="thumbnail">
                            <img src="{{ asset('images/' . $post->image) }}" alt="" class="img-responsive">
                        </a>
                    </div>

                </div>
             @endif

            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
        @foreach($post->comments as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))). "?s=50&d=wavatar" }}" alt="" class="author-image">
                    <div class="author-name">
                        <h4>{{ $comment->name }}</h4>
                        <p class="author-time">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                <div class="comment-content">
                    {{ $comment->comment }}

                </div>
            </div>
        @endforeach
    </div>
</div>


    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2">
            {{ Form::open(['route'=> ['comments.store', $post->id], 'method'=> 'POST']) }}

                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', null, ['class'=> 'form-control']) }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null, ['class'=> 'form-control']) }}
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('comment', 'Comment:') }}
                                {{ Form::textarea('comment', null, ['class'=> 'form-control', 'rows'=> '5']) }}
                             </div>


                            <div class="form-group">
                            {{ Form::submit('Add Comment', ['class'=> 'btn btn-success btn-block margin-top']) }}
                            </div>
                    </div>

                </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection