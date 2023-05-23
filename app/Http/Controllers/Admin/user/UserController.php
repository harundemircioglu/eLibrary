<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                return view('admin.user.user');
            }
        }
        return redirect('/');
    }

    public function newUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                return view('admin.user.new_user');
            }
        }
        return redirect('/');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        } else {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->auth = "admin";
            $user->save();

            return response()->json([
                'status' => 200,
                'success' => 'Ekleme işlemi başarılı',
            ]);
        }
    }

    public function allUser()
    {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                $users = User::where('auth', null)->paginate(5);
                return view('admin.user.all_user', compact('users'));
            }
        }
        return redirect('/');
    }

    public function search_user($user_email)
    {
        $user = User::where('email', 'LIKE', '%' . $user_email . '%')->get();


        if ($user->isEmpty()) {
            return response()->json([
                'status' => 201,
                'errors' => 'Kullanıcı bulunamadı',
            ]);
        }

        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function editUser($userId)
    {
        $user = User::find($userId);

        return response()->json([
            'user' => $user,
        ]);
    }

    public function updateUser(Request $request, $userId)
    {
        $user = User::find($userId);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return response()->json([
            'status' => 200,
            'success' => 'İşlem başarılı',
        ]);
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return response()->json([
            'status' => 200,
            'success' => 'İşlem başarılı',
        ]);
    }
}
