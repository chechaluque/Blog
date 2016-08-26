@extends('layouts.master')
@section('title')
    Edit Post
@endsection
@section('styles')
    {!! Html::style('css/parsley.css') !!}
    {!!  Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "link",
            menubar : false
        });
    </script>
@endsection
@section('content')

    <div class="row">
        {!! Form::model($post, ['route'=> ['posts.update', $post->id], 'method'=>'PUT', 'data-parsley-validate'=>'', 'files'=> true]) !!}
        <div class="col-md-8">
            <div class="form-group">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class'=> 'form-control input-lg', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug',null, ['class'=> 'form-control', 'required', 'minlength'=> '5', 'maxlength'=> '255']) }}
            </div>

            <div class="form-group">
                {{ Form::label('category_id', 'Category:') }}
                {{ Form::select('category_id', $categories, null, ['class'=> 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('tags', 'Tags:') }}
                {{ Form::select('tags[]', $tags, null, ['class'=> 'form-control select2-multi', 'multiple'=> 'multiple']) }}
            </div>

            <div class="form-group">
                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image') }}

            </div>

            <div class="form-group">
            {{ Form::label('body', 'Post:') }}
            {{ Form::textarea('body', null, ['class'=> 'form-control', 'required']) }}
            </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ $post->created_at->diffForHumans() }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated::</dt>
                    <dd>{{ $post->updated_at->diffForHumans() }}</dd>
                </dl>
                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class'=> 'btn btn-danger btn-block')) !!}

                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class'=> 'btn btn-success btn-block']) }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection
