<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;
    protected $table = 'umkm';
    protected $fillable = [
        'id',
        'nik',
        'nama_umkm',
        'nama_pemilik',
        'nohp',
        'logo',
        'alamat',
        'deskripsi',
        'status_validasi'
    ];

    public function gambarProduk(){
        return $this->hasMany(GambarProduk::class);
    }
}
