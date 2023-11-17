<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelumMenikah extends Model
{
    use HasFactory;
    protected $table = 'belum_menikah';
    protected $fillable = [
        'nama', 'ttl', 'jk', 'nik', 'agama', 'pekerjaan', 'alamat',
    ];
}
