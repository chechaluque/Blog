@extends('layouts.master')
@section('title')
    All Tags
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- End of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route'=> 'tags.store', 'method'=> 'POST', 'data-parsley-validate'=>'']) !!}
                <h3>New Tag</h3>
                <div class="form-group">
                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ['class'=> 'form-control', 'required'=>'', 'placeholder'=> 'Write the Category']) }}
                </div>
                {{ Form::submit('Create Tag', ['class'=> 'btn btn-primary btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection