<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id_user',
        'nama_kategori',
        'tipe'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_kategori');
    }
}

