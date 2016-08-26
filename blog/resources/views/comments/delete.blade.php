@extends('layouts.master')
@section('title')

    Delete Comment
@endsection
@section('content')
   <div class="row">
       <div class="col-md8 com-md-offset-2">
           <h1>Delete this Comment ?</h1>
           <p>
               <strong>Name:</strong> {{ $comment->name }} <br>
               <strong>Name:</strong> {{ $comment->email }} <br>
               <strong>Name:</strong> {{ $comment->comment }} <br>
           </p>
           {{ Form::open(['route'=> ['comments.destroy', $comment->id], 'method'=> 'DELETE']) }}
                {{ Form::submit('Yes Delete this Comment', ['class'=> 'btn btn-lg btn-block btn-danger']) }}
           {{ Form::close() }}
       </div>
   </div>

@endsection