<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLibraryBook extends Model
{
    use HasFactory;

    protected $fillable=['user_id','library_id','book_id'];

    //BU MODEL, User,Library ve Book MODELLERİ İLE İLİŞKİLENDİRİLECEK.
}
