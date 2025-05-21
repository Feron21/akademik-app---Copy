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
    Schema::create('jadwal_kuliahs', function (Blueprint $table) {
    $table->id();
    $table->string('mata_kuliah');
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->string('hari');
    $table->time('jam_mulai');
    $table->time('jam_selesai');
    $table->string('ruang');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kuliahs');
    }
};
