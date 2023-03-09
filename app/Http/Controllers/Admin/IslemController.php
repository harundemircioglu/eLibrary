<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IslemController extends Controller
{
    public function index()
    {
        return view('Admin.islemler');
    }

    public function kullanici_islemleri()
    {
        $users = User::all();
        return view('Admin.kullanici_islemleri', compact('users'));
    }

    public function userDetail($id)
    {
        $user=User::find($id);

        return response()->json([
            'user'=>$user
        ]);
    }

    public function updateUser(Request $request,$id)
    {
        $user=User::find($id);
        $user->name=$request->input('editName');
        $user->email=$request->input('editEmail');
        $user->password=$request->input('editPassword');
        $user->update();

        return response()->json([
            'success'=>'Güncelleme işlemi başarılı.'
        ]);


    }

    public function deleteShow($id)
    {
        $user=User::find($id);

        return response()->json([
            'user'=>$user
        ]);
    }

    public function deleteUser($id)
    {
        $user=User::destroy($id);

        return response()->json([
            'success'=>'Silme işlemi başarılı.'
        ]);
    }

    public function kitap_islemleri()
    {
        return view('Admin.kitap_islemleri');
    }

    public function addUser(Request $request)
    {
        $user = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];

        User::create($user);

        return response()->json([
            'success' => 'Kullanıcı ekleme işlemi başarılı.'
        ]);
    }
}
