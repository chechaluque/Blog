@extends('layouts.master')

@section('title')
        Create New Post
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
        <div class="col-md-8 col-md-offset-2">
            <h1> Create New Post</h1>
            <hr>

            {!! Form::open(array('route' => 'posts.store', 'data-parsley-validate'=>'', 'files'=> true)) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class'=> 'form-control', 'required'=>'', 'maxlength'=>'255', 'placeholder'=> 'Title')) }}
            </div>

            <div class="form-group">
                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug',null, ['class'=> 'form-control', 'required', 'minlength'=> '5', 'maxlength'=> '255']) }}
            </div>
            <div class="form-group">
                {{ Form::label('category_id', 'Category') }}
                <select name="category_id" id="" class="form-control">
                    @foreach($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('tags', 'Tags:') }}
                <select name="tags[]" id="" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>

                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('featured_image', 'Upload Featured Image:') }}
                {{ Form::file('featured_image') }}

            </div>


            <div class="form-group">
                {{ Form::label('body', 'Post Body:') }}
                {{ Form::textarea('body', null, array('class'=> 'form-control', 'placeholder'=> 'Write your message here...')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Create Post', array('class'=> 'btn btn-success btn-lg btn-block')) }}
            </div>
                {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection