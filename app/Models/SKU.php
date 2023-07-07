<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    use HasFactory;

    protected $table = 'sku';
    protected $fillable = [
        'users_id',
        'nama',
        'ttl',
        'nik',
        'jk',
        'pekerjaan',
        'agama',
        'alamat',
        'penghasilan',
        'jenis_usaha',
        'tahun',
        'created_at',
        'updated_at',
    ];
}
