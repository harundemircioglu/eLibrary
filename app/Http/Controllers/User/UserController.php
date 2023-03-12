<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //LOGIN
    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($user)) {
            return redirect('/');
        } else {
            dd('GİRİŞ BAŞARISIZ');
        }
    }

    //REGISTER
    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $user = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];
        $register = User::create($user);
        if ($register) {
            Auth::login($register);
            return redirect('/');
        } else {
            dd('İŞLEM BAŞARISIZ');
        }
    }


    //PROFILE
    public function profile($id)
    {
        if (Auth::check()) {
            $libraries=User::with('libraries')->where('id',$id)->get();
            $user = User::find($id);
            return view('profile',compact('user','libraries'));
        } else {
            return redirect('/');
        }
    }

    //UPDATE
    public function update($id,Request $request)
    {
        $user=User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->update();
        return redirect()->back();
    }
}
