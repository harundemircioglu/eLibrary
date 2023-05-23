<?php

namespace App\Http\Controllers;

use App\Models\Book;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    //WEB SAYFASI İLK AÇILDIĞINDA KARŞILAŞTIĞIMIZ SAYFA
    public function index()
    {
        $populerBooks = Book::orderBy('popularity', 'desc')->limit(7)->get();
        $softwareBooks = Book::where('category_name', 'Yazılım')->orderBy('popularity', 'desc')->limit(7)->get();
        $poemBooks = Book::where('category_name', 'Şiir')->orderBy('popularity', 'desc')->limit(7)->get();
        $storyBooks = Book::where('category_name', 'Hikaye')->orderBy('popularity', 'desc')->limit(7)->get();
        if (Auth::user()) {
            $user = Auth::user();
            return view('index', compact('user', 'populerBooks', 'softwareBooks', 'poemBooks', 'storyBooks'));
        }
        return view('index', compact('populerBooks', 'softwareBooks', 'poemBooks', 'storyBooks'));
    }

    //KİTAP ARAMA
    public function search($book_name)
    {
        $books = Book::where('book_name', 'LIKE', '%' . $book_name . '%')->get();

        if ($books->isEmpty()) {
            return response()->json([
                'status'=>201,
                'errors' => 'Kitap bulunamadı',
            ]);
        };

        return response()->json([
            'status' => 200,
            'books' => $books,
        ]);
    }


    //GİRİŞ YAPMA SAYFASI
    public function login()
    {
        return view('login');
    }

    //ÜYE OLMA SAYFASI
    public function register()
    {
        return view('register');
    }
}
