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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // Mengacu ke kolom id di tabel users
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('materi_id') // Mengacu ke kolom id di tabel materi
                  ->constrained('materis') // Perbaiki di sini untuk mengacu ke tabel materi
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function histories()
    {
        return $this->hasMany(History::class);
    }
    
};
