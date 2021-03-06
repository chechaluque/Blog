@extends('layouts.master')
@section('title')
    Blog
@endsection
@section('ActiveBlog')
    active
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <h5>Publish: {{ $post->created_at->diffForHumans() }}</h5>

            <p>{{ substr(strip_tags($post->body), 0, 300)}}{{str_limit(strip_tags($post->body), $limit = 300, $end = '...') }}</p>
            <a href="{{ route('blog', [$post->slug]) }}"class="btn btn-primary">Read More</a>
            <hr>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection