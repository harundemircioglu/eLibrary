<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksInLibrary extends Model
{
    use HasFactory;

    protected $table = 'books_in_libraries';
    // varsayılan isimden farklı bir isim kullanın

    protected $fillable = ['library_id', 'book_id'];

    //kitap modeline gidecek
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
