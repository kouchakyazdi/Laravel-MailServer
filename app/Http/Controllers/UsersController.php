<?php

namespace App\Http\Controllers;

use App\Email;
use App\User;
use Illuminate\Support\Facades\Auth;
use Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllUsers()
    {
        $users = User::all();
        return view('pages.users', compact('users'));
    }

    public function addToContact()
    {
        $contactEmail = Request::get('email');
        $myEmail = Auth::user()->email;

        $users = User::all();;
    }
}
