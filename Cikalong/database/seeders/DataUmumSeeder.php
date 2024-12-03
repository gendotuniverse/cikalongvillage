<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('data_umums')->insert([
            [
                'kategori_judul_id' => 1, // Pendidikan
                'sub_kategori_judul_id' => 1, // Sekolah Dasar
                'file_excel' => 'uploads/data_umum/pendidikan_sekolah_dasar.xlsx',
            ],
            [
                'kategori_judul_id' => 2, // Kesehatan
                'sub_kategori_judul_id' => 3, // Puskesmas
                'file_excel' => 'uploads/data_umum/kesehatan_puskesmas.xlsx',
            ],
        ]);
    }
}
