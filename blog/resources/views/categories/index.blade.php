@extends('layouts.master')
@section('title')
    All Categories
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- End of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route'=> 'categories.store', 'method'=> 'POST', 'data-parsley-validate'=>'']) !!}
                <h3>New Category</h3>
                    <div class="form-group">
                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class'=> 'form-control', 'required'=>'', 'placeholder'=> 'Write the Category']) }}
                    </div>
                {{ Form::submit('Create Category', ['class'=> 'btn btn-primary btn-block']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection