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
    Schema::create('absensi_sessions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('jadwal_kuliah_id')->constrained()->onDelete('cascade');
        $table->date('tanggal');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_sessions');
    }
};
