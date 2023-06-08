<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'kartu_keluarga_id',
        'nama',
        'nik',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'jenis_pekerjaan',
        'status_perkawinan',
        'status_hubungan_dalam_keluarga',
        'nama_ayah',
        'nama_ibu',
    ];
}
