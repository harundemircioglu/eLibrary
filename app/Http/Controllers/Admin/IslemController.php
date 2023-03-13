<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IslemController extends Controller
{
    public function index()
    {
        return view('Admin.islemler');
    }

    //KULLANICI İŞLEMLERİ

    public function kullanici_islemleri()
    {
        $users = User::paginate(5); // KULLANICILARI 5 KİŞİLİK GRUPLAR HALİNDE SAYFALIYOR
        return view('Admin.kullanici_islemleri', compact('users'));
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

    public function userDetail($id)
    {
        $user = User::find($id);

        return response()->json([
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('editName');
        $user->email = $request->input('editEmail');
        $user->password = Hash::make($request->input('editPassword'));
        $user->update();

        return response()->json([
            'success' => 'Güncelleme işlemi başarılı.'
        ]);
    }

    public function deleteShow($id)
    {
        $user = User::find($id);

        return response()->json([
            'user' => $user
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::destroy($id);

        return response()->json([
            'success' => 'Silme işlemi başarılı.'
        ]);
    }

    //KİTAP İŞLEMLERİ

    public function kitap_islemleri()
    {
        return view('Admin.kitap_islemleri');
    }

    public function allBook()
    {
        $books = Book::all();
        return response()->json([
            'books' => $books,
        ]);
    }

    public function addBook(Request $request)
    {
        $book = [
            'kitap_adi' => $request->input('kitap_adi'),
            'kitap_turu' => $request->input('kitap_turu'),
            'yazar_adi' => $request->input('yazar_adi'),
            'yayin_evi' => $request->input('yayin_evi'),
            'yayinlanma_tarihi' => $request->input('yayinlanma_tarihi'),
            //EN SON EKLENECEK//'kapak_resmi'=>$request->file('kapak_resmi')->store('resimler')
        ];

        Book::create($book);

        return response()->json([
            'success' => 'Ekleme işlemi başarılı',
        ]);
    }

    public function showEditBook($id)
    {
        $book = Book::find($id);
        return response()->json([
            'book' => $book,
        ]);
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        $book->kitap_adi = $request->input('kitap_adi');
        $book->kitap_turu = $request->input('kitap_turu');
        $book->yazar_adi = $request->input('yazar_adi');
        $book->yayin_evi = $request->input('yayin_evi');
        $book->yayinlanma_tarihi = $request->input('yayinlanma_tarihi');
        $book->update();

        return response()->json([
            'success' => 'Güncelleme işlemi başarılı',
        ]);
    }

    public function showDeleteBook($id)
    {
        $book = Book::find($id);
        return response()->json([
            'book' => $book,
        ]);
    }

    public function deleteBook($id)
    {
        Book::destroy($id);
        return response()->json([
            'success' => 'Silme işlemi başarılı',
        ]);
    }

    public function profile(Request $request)
    {
        if (Auth::check()) {
            $user = $request->user();
            return view('Admin.profile', compact('user'));
        } else {
            return redirect('/');
        }
    }

    public function passwordSettings(Request $request)
    {
        if (Auth::check()) {
            $user=$request->user();
            return view('Admin.password_settings',compact('user'));
        }
        else {
            return redirect('/');
        }
    }
}
