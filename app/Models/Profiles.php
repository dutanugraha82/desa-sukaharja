<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function user(){
        return $this->hasOne(User::class,'profiles_id');
    }

    public function kk(){
        return $this->belongsTo(KartuKeluarga::class,'kartu_keluarga_id');
    }

    public static function age($gender, $minAge, $maxAge){
        $currentDate = now();
        $minDate = $currentDate->subYear($maxAge)->format('Y-m-d');
        $maxDate = $currentDate->addYear($maxAge-$minAge)->format('Y-m-d');
        
        return self::where('jk',$gender)->whereBetween('tanggal_lahir',[$minDate, $maxDate])->get();

    }
}
