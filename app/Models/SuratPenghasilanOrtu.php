<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPenghasilanOrtu extends Model
{
    use HasFactory;

    protected $table = 'surat_penghasilan_ortu';
    protected $fillable = [
        'nama',
        'ttl',
        'agama',
        'jk',
        'pekerjaan',
        'nik',
        'kewarganegaraan',
        'alamat',
        'nama_anak',
        'ttl_anak',
        'jk_anak',
        'pekerjaan_anak',
        'nik_anak',
        'alamat_anak',
        'penghasilan',
        'ejaan_penghasilan',
        'anggota',
        'ejaan_anggota',
    ];
}
