@extends('layouts.master')
@section('title')
    Checha Blog
@endsection
@section('ActiveHome')
    active
@endsection
@section('content')

        <div class="row">
            <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to My Blog!</h1>
                <p class="lead">Thank you so much for visiting.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

                @foreach($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body), 0, 300)}}{{str_limit(strip_tags($post->body), $limit = 300, $end = '...') }}</p>
                    <a href="{{ route('blog', $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                <hr>
            @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
               <h2>Sidebar</h2>
            </div>

@endsection

