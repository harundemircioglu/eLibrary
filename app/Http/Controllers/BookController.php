<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BooksInLibrary;
use App\Models\Library;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // Belirli bir kitap ID'sine göre kitap bilgilerini getirir
    public function bookDetails($bookId)
    {
        $book = Book::where('id', $bookId)->first();

        // Kitabın popülerlik sayacını arttırır ve veritabanında kaydeder
        $book->popularity++;
        $book->save();

        // Kitap veritabanında yoksa 404 hatası döndürür
        if (!$book) {
            abort(404);
        }

        // Seçilen kitabın kategorisindeki en popüler 4 kitabı getirir
        $recommendeds = Book::where('category_name', $book->category_name)
            ->where('id', '!=', $bookId) // Mevcut kitabın ID'si dışındaki kitapları al
            ->orderBy('popularity', 'desc')
            ->limit(3)
            ->get();

        // Kullanıcıya önerilecek kitap bulamazsa kendisi dışında rastgele 4 kitap önerir
        if ($recommendeds->isEmpty()) {
            $recommendeds = Book::where('id', '!=', $bookId)
                ->inRandomOrder()
                ->limit(4)
                ->get();
        }

        //Popüler olan kitaplar
        $populerBooks = Book::orderBy('popularity')->limit(6)->get();

        // Herhangi bir kullanıcı girişi varsa kütüphane verilerini de çeker
        if (Auth::check()) {
            $user = Auth::user();
            $libraries = Library::where('user_id', Auth::id())->get();
            return view('book_detail', compact('book', 'user', 'recommendeds', 'libraries', 'populerBooks'));
        }


        return view('book_detail', compact('book', 'recommendeds', 'populerBooks'));
    }

    // Kütüphaneden silinecek kitabın ID'sine göre kitap bilgilerini getirir
    public function selectDeleteBook($library_id, $book_id)
    {
        $book = BooksInLibrary::with('library')->where('library_id', $library_id)->with('book')->where('book_id', $book_id)->first();

        return response()->json([
            'book' => $book,
        ]);
    }

    // Kütüphaneden kitap silme işlemi
    public function deleteBookInLibrary($library_id, $book_id)
    {
        $deleteBook = BooksInLibrary::where('library_id', $library_id)->where('book_id', $book_id)->first();

        // Kitabı kütüphaneden siler
        $deleteBook->delete();

        return response()->json([
            'success' => 'Silme işlemi başarılı',
        ]);
    }
}
