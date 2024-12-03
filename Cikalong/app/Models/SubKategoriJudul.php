<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriJudul extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // Relasi ke KategoriJudul
    public function kategoriJudul()
    {
        return $this->belongsTo(KategoriJudul::class, 'kategori_judul_id');
    }
}
