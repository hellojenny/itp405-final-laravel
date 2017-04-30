<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function signup()
    {
        $user = new User();
        $user->username = request('username');
        $user->password = Hash::make(request('password'));
        $user->save();

        return redirect('/login')
        ->with('successStatus', 'Thanks for creating your account. Log in now.');
    }
}
