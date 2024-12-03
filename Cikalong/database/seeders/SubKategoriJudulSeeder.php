<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubKategoriJudulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sub_kategori_juduls')->insert([
            ['kategori_judul_id' => 1, 'name' => 'Sekolah Dasar'],
            ['kategori_judul_id' => 1, 'name' => 'Sekolah Menengah'],
            ['kategori_judul_id' => 2, 'name' => 'Puskesmas'],
            ['kategori_judul_id' => 2, 'name' => 'Rumah Sakit'],
            ['kategori_judul_id' => 3, 'name' => 'Jalan Raya'],
            ['kategori_judul_id' => 3, 'name' => 'Jembatan'],
            ['kategori_judul_id' => 4, 'name' => 'Bantuan Sosial'],
            ['kategori_judul_id' => 4, 'name' => 'Pemberdayaan Masyarakat'],
        ]);
    }
}
