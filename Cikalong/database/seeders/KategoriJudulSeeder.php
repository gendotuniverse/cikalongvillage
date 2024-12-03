<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriJudulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kategori_juduls')->insert([
            ['name' => 'Pendidikan'],
            ['name' => 'Kesehatan'],
            ['name' => 'Infrastruktur'],
            ['name' => 'Sosial'],
        ]);
    }
}
