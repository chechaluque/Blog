@extends('layouts.master')

@section('title')
    View Post
@endsection

@section('content')
   <div class="row">
       <div class="col-md-8">
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
           <p class="lead">{{ strip_tags($post->body) }}</p>
           <hr>
           <div class="tags">
           @foreach($post->tags as $tag)

            <span class="label label-default">{{ $tag->name }}</span>
           @endforeach
           </div>
           <div class="backend-comment margin-top">
               <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

               <table class="table">
                   <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                   </thead>
                   <tbody>
                   @foreach($post->comments as $comment)
                   <tr>
                       <td>{{ $comment->name }}</td>
                       <td>{{ $comment->email }}</td>
                       <td>{{ $comment->comment }}</td>
                       <td>
                           <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-md btn-primary"> <span class="glyphicon glyphicon-pencil"></span> </a>
                           <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash"></span></a>
                       </td>
                   </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>

       <div class="col-md-4">
           <div class="well">
               <dl class="dl-horizontal">
                   <label>Url Slug: </label>
                   <p><a href="{{ route('blog', $post->slug) }}">{{ route('blog', $post->slug) }}</a></p>
               </dl>

               <dl class="dl-horizontal">
                   <label>Category: </label>
                   <p>{{ $post->category->name }}</p>
               </dl>

                <dl class="dl-horizontal">
                    <label>Created At: </label>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </dl>
               <dl class="dl-horizontal">
                   <label>Last Updated::</label>
                   <p>{{ $post->updated_at->diffForHumans() }}</p>
               </dl>
               <hr>
    
              <div class="row"> 
                   <div class="col-sm-6">
                       {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=> 'btn btn-primary btn-block')) !!}

                   </div>
                   <div class="col-sm-6">
                       {!! Form::open(['route'=> ['posts.destroy', $post->id], 'method'=> 'DELETE']) !!}

                       {!! Form::submit('Delete', ['class'=> 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                   </div>
              </div>


               <div class="row">
                   <div class="col-md-12">
                       <div class="form-group">
                       {{ Html::linkRoute('posts.index', 'See All Post', [], ['class'=> 'btn btn-default btn-block margin-top',]) }}
                       </div>
                       </div>
               </div>
           </div>
       </div>
   </div>

@endsection