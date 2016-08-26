<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class PagesController extends Controller
{
    public function getIndex()
    {
        $post = Post::orderBy('id', 'desc')->limit(4)->get();
        return view('pages.welcome')->with('posts', $post);
    }
    public function getAbout()
    {
        return view('pages.about');
    }
    public function getContact()
    {
        return view('pages.contact');
    }
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'subject'=> 'required|min:3',
            'message'=> 'required|min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
        Mail::send('emails.contac', $data, function ($message) use ($data){
                $message->from($data['email']);
                $message->to('checha@gmail.com');
                $message->subject($data['subject']);
        });
            Session::flash('success', 'Your message was sent successfully');
        return redirect('/');
    }
}
