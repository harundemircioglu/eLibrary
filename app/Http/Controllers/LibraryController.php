<?php

namespace App\Http\Controllers;

use App\Models\BooksInLibrary;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    //YENİ KÜTÜPHANE EKLEME
    public function addNewLibrary(Request $request)
    {
        $validator = Validator::make($request->only(['library_name']), [
            'library_name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->all(),
            ]);
        } else {

            $library = [
                'library_name' => $request->input('library_name'),
                'user_id' => $request->input('user_id'),
            ];

            Library::create($library);

            return response()->json([
                'status' => 200,
                'success' => 'Kütüphane başarıyla eklendi.'
            ]);
        }
    }

    //KULLANICI KÜTÜPHANELERİ
    public function myLibraries($userId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            //ID DEĞERİNE GÖRE KULLANICININ KÜTÜPHANELERİ GELİYOR VE BU KÜTÜPHANELERDEKİ KİTAP SAYILARI SAYILIYOR
            $librariesWithBookCount = Library::withCount('booksInLibraries')->where('user_id', Auth::id())->get();
            return view('libraries', compact('user', 'librariesWithBookCount'));
        }
        return redirect()->back();
    }

    //KÜTÜPHANE DETAY (BURADA KULLANICI KÜTÜPHENEYE EKLEMİŞ OLDUĞU KİTAPLARI GÖRMEKTEDİR)
    public function libraryDetail($libraryId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $library = Library::with('users')->where('id', $libraryId)->first();
            //SEÇİLEN KÜTÜPHANE İÇERİSİNDEKİ KİTAPLARI GÖSTEREN KOD
            $booksInLibrary = BooksInLibrary::with(['library', 'book'])->where('library_id', $libraryId)->get();
            //dd($booksInLibrary);
            return view('library_details', compact('user', 'library', 'booksInLibrary'));
        }
        return redirect()->back();
    }

    //KÜTÜPHANE DÜZENLE
    public function editLibrary($libraryId)
    {
        $library = Library::find($libraryId);

        return response()->json([
            'library' => $library,
        ]);
    }

    //KÜTÜPHANE GÜNCELLE
    public function updateLibrary(Request $request, $libraryId)
    {
        $library = Library::find($libraryId);
        $library->library_name = $request->input('library_name');
        $library->user_id = $request->input('user_id');
        $library->save();

        return response()->json([
            'status' => 200,
            'success' => 'Güncelleme işlemi başarılı',
        ]);
    }

    //KÜTÜPHANEYE KİTAP EKLEME
    public function addBookInLibrary(Request $request)
    {
        $addBookInLibrary = new BooksInLibrary;
        $addBookInLibrary->library_id = $request->input('library_id');
        $addBookInLibrary->book_id = $request->input('book_id');
        $addBookInLibrary->save();

        return response()->json([
            'status' => 200,
            'success' => 'Kitap başarı ile eklenmiştir',
        ]);
    }


    //KÜTÜPHANE SİL
    public function deleteLibrary($libraryId)
    {
        $library = Library::find($libraryId);

        $library->delete();

        return response()->json([
            'status' => 200,
            'success' => 'Silme işlemi başarılı',
        ]);
    }
}
