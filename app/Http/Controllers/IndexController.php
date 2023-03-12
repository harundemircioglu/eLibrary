<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = $request->user();
        }
        else{
           $user="";
        }
        $books=Book::paginate(16);
        return view('welcome',compact('books','user'));
    }
}
