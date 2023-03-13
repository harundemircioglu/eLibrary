<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable=['kitap_adi','kitap_turu','yazar_adi','yayin_evi','yayinlanma_tarihi'];

    //BU MODEL, UserLibraryBook MODELİ İLE İLİŞKİLENDİRİLECEK.
}
