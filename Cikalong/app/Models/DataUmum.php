<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmum extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function kategoriJudul()
    {
        return $this->belongsTo(KategoriJudul::class, 'kategori_judul_id');
    }

    /**
     * Relasi ke tabel SubKategoriJudul
     */
    public function subKategoriJudul()
    {
        return $this->belongsTo(SubKategoriJudul::class, 'sub_kategori_judul_id');
    }
}
