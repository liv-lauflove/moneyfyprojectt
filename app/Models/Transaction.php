<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    protected $table = 'transactions';

    protected $fillable = [
        'id_user',
        'id_kategori',
        'tanggal_transaksi',
        'jumlah_transaksi',
        'catatan',
        'saldo_sebelumnya'
    ];

    protected $casts = [
        'tanggal_transaksi' => 'date'
    ];
}
