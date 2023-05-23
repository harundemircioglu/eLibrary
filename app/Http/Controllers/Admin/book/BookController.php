<?php

namespace App\Http\Controllers\Admin\book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function book()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                return view('admin.book.book');
            }
        }
        return redirect('/');
    }

    public function newBook()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                $books = Book::all();
                return view('admin.book.new_book', compact('books'));
            }
        }
        return redirect('/');
    }

    public function addBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_name' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'author_name' => 'required|string|max:255',
            'publication_year' => 'required|integer',
            'book_image_url' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        }

        $book_image_url = $request->file('book_image_url')->store('public/images');

        $book = new Book;
        $book->book_name = $request->input('book_name');
        $book->category_name = $request->input('category_name');
        $book->author_name = $request->input('author_name');
        $book->publication_year = $request->input('publication_year');
        $book->book_image_url = $book_image_url;
        $book->popularity = 0;
        $book->save();

        return response()->json([
            'status' => 200,
            'success' => 'Kitap ekleme işlemi başarılı',
        ]);
    }

    public function allBook()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->auth == "admin") {
                $books = Book::paginate(5);
                return view('admin.book.all_book', compact('books'));
            }
        }
        return redirect('/');
    }

    public function search_book($book_name)
    {
        $book = Book::where('book_name', 'LIKE', '%' . $book_name . '%')->get();

        if ($book->isEmpty()) {
            return response()->json([
                'status' => 201,
                'errors' => 'Kitap bulunamadı',
            ]);
        }

        return response()->json([
            'status' => 200,
            'book' => $book,
        ]);
    }
}
