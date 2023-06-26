<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTM extends Model
{
    use HasFactory;

    protected $table = 'ktm';
    protected $fillable = [
        'users_id',
        'nama_ortu',
        'ttl_ortu',
        'jk_ortu',
        'nik',
        'agama',
        'pekerjaan',
        'alamat',
        'nama_anak',
        'ttl_anak',
        'jk_anak',
        'sekolah',
        'created_at',
        'updated_at',
    ];
}
