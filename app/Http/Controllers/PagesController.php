<?php

namespace App\Http\Controllers;

use App\Email;
use Request;
use App\Http\Requests;

//use Illuminate\Http\Request;

class PagesController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    function aboutUs()
    {

//        return \Auth::user();
        $name = ['Mohammad', 'Mahdi'];
        $family = ['Kouchak', 'Yazdi'];
        return view('pages.aboutUs', compact('name', 'family'));
    }

    function allMails()
    {
        $emails = Email::all();
        return view('pages.allMails', compact('emails'));
    }

    function create()
    {
        return view('pages.create');
    }

    function save()
    {
        $request = Request::all();
        return $request;
    }
}
