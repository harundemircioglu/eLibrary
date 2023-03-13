<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use App\Models\User;
use App\Models\UserLibraryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function bookDetail($kitap_id, Request $request)
    {
        if (Auth::check()) {
            $user = $request->user();
            $libraries = User::with('libraries')->where('id', $user->id)->get();
        } else {
            $user = "";
            $libraries="";
        }
        $book = Book::find($kitap_id);
        return view('book_detail', compact('book', 'user', 'libraries'));
    }

    public function addUserLibraryBook(Request $request)
    {
        $addUserLibraryBook = [
            'user_id' => $request->input('user_id'),
            'library_id' => $request->input('library_id'),
            'book_id' => $request->input('book_id'),
        ];

        UserLibraryBook::create($addUserLibraryBook);

        return response()->json([
            'success' => 'Ekleme işlemi başarılı',
        ]);
    }
}
