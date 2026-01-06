<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //fungsi yg jalan kalau php artisan migrate dijalankan
    {
        Schema::create('categories', function (Blueprint $table) { //untuk buat tabel categories, $tabel itu object blueprint utk definisikan kolom2 tabel
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->text('nama_kategori');
            $table->enum('tipe', ['pemasukan', 'pengeluaran']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //fungsi untuk batalkan migration
    {
        Schema::dropIfExists('categories');
    }
};
