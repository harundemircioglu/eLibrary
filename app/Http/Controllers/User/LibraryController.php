<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function myLibraries($id, Request $request)
    {
        if (Auth::check()) {
            $user = $request->user();
            $libraries = User::with('libraries')->where('id', $id)->get();
            return view('libraries', compact('libraries','user'));
        }
        else {
            return redirect('/');
        }
    }

    public function libraryDetails(Request $request,$id)
    {
        if (Auth::check()) {
            $user=$request->user();
            $library =  Library::find($id);
            return view('library_detail',compact('user','library'));
        }
        else {
            return redirect('/');
        }
    }

    public function addLibrary(Request $request)
    {
        if (Auth::check()) {
            $user=$request->user();
        }

        $library=[
            'kutuphane_adi'=>$request->input('kutuphane_adi'),
            'olusturan_kisi_id'=>$user->id,
        ];

        Library::create($library);

        return redirect()->back();
    }
}
