<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void //fungsi yg dijalankan saat migrasi, tdk kembalikan nilai apapun
    {
        Schema::create('transactions', function (Blueprint $table) { //buat tabel transactions
            $table->id(); //kolom id sbg primary key auto increment
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); //foreign key link ke tabel users, onDelete cascade: jika user dihapus, semua transaksinya juga dihapus
            $table->foreignId('id_kategori')->constrained('categories')->onDelete('cascade');
            $table->date('tanggal_transaksi');
            $table->integer('jumlah_transaksi');
            $table->text('catatan')->nullable(); //catatan boleh kosong
            $table->integer('saldo_sebelumnya');
            $table->timestamps(); //otomatis membuat createdat dan updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //fungsi yg dijalankan saat rollback migrasi, tdk kembalikan nilai apapun
    {
        Schema::dropIfExists('transactions');
    }
};
