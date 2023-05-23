<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                return redirect('admin/home');
            } else {
                return redirect('/');
            }
        }
        return view('admin.login');
    }

    public function loginAdmin(Request $request)
    {
        $email = $request->input('email');

        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user != null && Hash::check($password, $user->password)) {

            if ($user->auth == "admin") {
                Auth::login($user);
                return response()->json([
                    'status' => 200,
                    'success' => 'Giriş işlemi başarılı. Yönlendiriliyorsunuz.'
                ]);
            } else {
                return redirect('/');
            }
        } else {

            return response()->json([
                'status' => 401,
                'errors' => 'Kullanıcı adı veya şifre hatalı',
            ]);
        }
    }

    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                return view('admin.home', compact('user'));
            }
        }
        return redirect('/');
    }

    public function profile()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                return view('admin.profile.profile');
            }
        }
        return redirect('/');
    }
}
