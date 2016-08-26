@extends('layouts.master')
@section('title')
    Forgot my Password
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                     @endif
                    {!! Form::open(['url'=> 'password/email', 'method'=> 'POST', 'data-parsley-validate'=>'']) !!}

                    <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', null, ['class'=> 'form-control', 'required'=>'']) }}
                    </div>

                    <div class="form-group">
                         {{ Form::submit('Reset Password', ['class'=>'btn btn-primary']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection