<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasDesaModel extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_desa';
    protected $guarded = ['id'];
}
