<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //

    function aboutUs()
    {

//        return \Auth::user();
        $name = ['Mohammad', 'Mahdi'];
        $family = ['Kouchak', 'Yazdi'];
        return view('pages.aboutUs', compact('name', 'family'));
    }

}
