<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKULuar extends Model
{
    use HasFactory;

    protected $table = 'sku_luar';
    protected $fillable = [
        'jenis_usaha',
        'penghasilan',
        'tahun_berdiri',
        'nama',
        'ttl',
        'nik',
        'jk',
        'pekerjaan',
        'agama',
        'kelurahan',
        'kecamatan',
        'kota',
        'alamat_usaha',
        'alamat_asal',
    ];
}
