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
        Schema::create('profils', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->foreignId('user_id') // Mendefinisikan kolom user_id sebagai foreign key
                  ->constrained('users') // Mengacu ke kolom idUser di tabel users
                  ->onDelete('cascade'); // Menghapus profil jika user dihapus
            $table->string('username');
            $table->string('level');
            $table->string('score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
