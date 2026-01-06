<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; //classnya pakai tabel categories

    protected $fillable = [
        'id_user',
        'nama_kategori',
        'tipe'
    ];

    public function transactions() //fungsi utk ambil semua transaksi dari kategori ini
    {
        return $this->hasMany(Transaction::class, 'id_kategori'); //hasMany: satu kategori punya banyak transaksi, id_kategori itu foreign key di tabel transactions
    }
}

