<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    use HasFactory;
    protected $table = 'gambar_produk';
    protected $fillable = [
        'id',
        'umkm_id',
        'gambar_produk',
    ];

}
