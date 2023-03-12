<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //LOGIN
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('login');
    }

    //REGISTER
    public function register()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('register');
    }

    //LOGOUT
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

}
