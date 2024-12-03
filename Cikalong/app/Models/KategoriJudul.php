<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJudul extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function subKategori()
    {
        return $this->hasMany(SubKategoriJudul::class, 'kategori_judul_id');
    }
}
