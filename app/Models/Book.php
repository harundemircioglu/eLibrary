<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_name',
        'category_name',
        'author_name',
        'publication_year',
        'book_image_url',
        'popularity'
    ];

    public function booksInLibrary()
    {
        return $this->hasMany(BooksInLibrary::class);
    }
}
