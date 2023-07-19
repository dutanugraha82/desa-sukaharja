<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $table = 'kartu_keluarga';
    protected $fillable = [
        'nama_kepala_keluarga',
        'no_kk',
        'nama_kepala_keluarga',
        'alamat',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'pos',
        'provinsi',
        'created_at',
        'updated_at',
    ];

    public function profile(){
        return $this->hasMany(Profiles::class,'kartu_keluarga_id');
    }
}
