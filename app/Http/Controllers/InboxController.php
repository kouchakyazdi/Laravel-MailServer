<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Request;

class InboxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function inbox()
    {
        return view('inbox');
    }

    public function compose()
    {
        return view('compose');
    }

    public function showProfile()
    {
        return view('profile');
    }

    public function saveProfile()
    {
        $inputs = Request::all();
        $from = Auth::user()->email;
    }

    public function sendSuccessfull()
    {
        return view('sendSuccessfull');
    }

    public function send()
    {
//        first check if $from has the $to in his contact list , if no : error and if yes :
//        posting $to and $from in a json format using ajax and get them in CheckDB controller function using request
        $inputs = Request::all();
        $from = Auth::user()->email;

        Email::create(['from' => $from, 'to' => $inputs['to'], 'subject' => $inputs['subject'], 'text' => $inputs['article-ckeditor'], 'attachment' => $inputs['attachment']]);
        return redirect('/compose/sendSuccessfull');
//        return compact('from','inputs');

//        $to = $inputs['to'];
//        $subject = $inputs['subject'];
//        $text = $inputs['article-ckeditor'];
//        $email = new Email;
//        $email->from = $from;
//        $email->to = $to;
//        $email->subject = $subject;
//        $email->text = $text;
//        $email->save();
//        return $email;
    }
}
