<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = ['library_name','user_id'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function booksInLibraries()
    {
        return $this->hasMany(BooksInLibrary::class);
    }
}
