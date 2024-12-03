<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_umums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_judul_id')->constrained('kategori_juduls')->onDelete('cascade');
            $table->string('sub_kategori_judul_id')->nullable();
            $table->string('file_excel')->comment('Path file Excel yang diunggah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_umums');
    }
};
