<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomisiliDalam extends Model
{
    use HasFactory;
    protected $table = 'domisili_dalam';
    protected $fillable = [
        'nama', 'ttl', 'jk', 'agama', 'pekerjaan', 'kewarganegaraan', 'nik', 'alamat', 'masa_berlaku'
    ];
}
