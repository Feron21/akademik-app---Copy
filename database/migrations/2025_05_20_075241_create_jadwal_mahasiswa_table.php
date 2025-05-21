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
        Schema::create('jadwal_mahasiswa', function (Blueprint $table) {
            $table->id();

            // foreign key ke jadwal_kuliahs
            $table->foreignId('jadwal_kuliah_id')
                ->constrained('jadwal_kuliahs')
                ->onDelete('cascade');

            // foreign key ke users (mahasiswa)
            $table->foreignId('mahasiswa_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();

            // agar mahasiswa tidak bisa daftar 2x di jadwal yg sama
            $table->unique(['jadwal_kuliah_id', 'mahasiswa_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_mahasiswa');
    }
};
