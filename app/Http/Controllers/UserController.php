<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //PROFİL İŞLEMLERİ
    public function profile($userId)
    {
        $user = User::find($userId);
        return view('profile', compact('user'));
    }

    //PROFİL BİLGİLERİNİ GÜNCELLEME
    public function updateProfile(Request $request, $userId)
    {
        $validator = Validator::make($request->only(['name', 'email', 'phone']), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'numeric|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        } else {
            $userId = Auth::id();
            $user = User::find($userId);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->save();

            return response()->json([
                'status' => 200,
                'success' => 'Profil başarıyla güncellendi.',
            ]);
        }
    }

    //ŞİFRE GÜNCELLEME
    public function updatePassword(Request $request, $userId)
    {
        $validator = Validator::make($request->only(['password']), [
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        } else {
            $userId = Auth::id();
            $user = User::find($userId);
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return response()->json([
                'status' => 200,
                'success' => 'Şifre başarıyla güncellendi.',
            ]);
        }
    }

    //ÜYE OLMA
    public function signin(Request $request)
    {
        $validator = Validator::make($request->only(['name', 'email', 'password']), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        } else {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            Auth::login($user);

            return response()->json([
                'status' => 200,
                'success' => 'Üyelik işlemi başarılı. Yönlendiriliyorsunuz.',
            ]);
        }
    }

    //GİRİŞ YAPMA
    public function login(Request $request)
    {
        $validator = Validator::make($request->only(['email', 'password']), [
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                $request->session()->put('admin', true);
            }
            return response()->json([
                'status' => 200,
                'success' => 'Giriş işlemi başarılı. Yönlendiriliyorsunuz.',
            ]);
        }

        return response()->json([
            'status' => 401,
            'errors' => 'E-posta veya şifre hatalı',
        ]);
    }


    //ÇIKIŞ YAPMA
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
