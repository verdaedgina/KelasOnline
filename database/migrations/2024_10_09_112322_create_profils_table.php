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
                  ->constrained('users') // Mengacu ke kolom id di tabel users
                  ->onDelete('cascade'); // Menghapus profil jika user dihapus
            $table->string('username'); // Kolom untuk username
            $table->string('level')->default('pemula');; // Kolom untuk level
            $table->integer('score')->default(0); // Kolom untuk score dengan default 0
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
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
