<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable=['kutuphane_adi','olusturan_kisi_id'];

    public function users()
    {
        return $this->hasMany(User::class,'olusturan_kisi_id','id');
    }
}
