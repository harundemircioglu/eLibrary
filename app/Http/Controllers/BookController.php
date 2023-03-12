<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function bookDetail($id,Request $request)
    {
        if (Auth::check()) {
            $user=$request->user();
        } else {
            $user="";
        }
        $book=Book::find($id);
        return view('book_detail',compact('book','user'));
    }
}
