@extends('layouts.master')
@section('title')
    Contact
@endsection
@section('styles')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('ActiveContact')
   active
@endsection
@section('content')

        <div class="row">
                <div class="col-md-12">
                    <h1>Contact Me</h1>
                    <hr>
                    <form action="{{ route('contact') }}" method="post" data-parsley-validate="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label name="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label name="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" minlength="3" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label name="email">Message:</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" required minlength="10"  placeholder="Type your message here.."></textarea>
                        </div>
                        <input type="submit" value="Send Message" class="btn btn-success">
                    </form>
                </div>

        </div>

@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}

@endsection