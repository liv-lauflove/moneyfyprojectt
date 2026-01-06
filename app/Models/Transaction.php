<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory; //aktifkan fitur factory untuk model ini

    public function user() //1 transaksi dimiliki oleh satu user
    {
        return $this->belongsTo(User::class, 'id_user'); //$this itu object transaction, belongTo itu object ini dimiliki oleh object lain,
        //  user::class itu nama kelas user biar tau relasinya ke tabel user, id_user jdi foreign key di tabel transactions
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    protected $table = 'transactions'; //class ini pakai tabel transactions

    protected $fillable = [ //daftar kolom yg boleh diisi langsung
        'id_user',
        'id_kategori',
        'tanggal_transaksi',
        'jumlah_transaksi',
        'catatan',
        'saldo_sebelumnya'
    ];

    protected $casts = [ //laravel akan ubah tipe datanya
        'tanggal_transaksi' => 'date' //dari stirng jadi object carbon untuk datetime
    ];
}
