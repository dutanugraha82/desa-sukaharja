<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index(){

       $p05 = Profiles::age('Perempuan',0,5)->count();
       $p517 = Profiles::age('Perempuan',5,17)->count();
       $p1730 = Profiles::age('Perempuan',17,30)->count();
       $p3060 = Profiles::age('Perempuan',30,60)->count();
       $p60 = Profiles::age('Perempuan',60,150)->count();
       
       $l05 = Profiles::age('Laki-Laki',0,5)->count();
       $l517 = Profiles::age('Laki-Laki',5,17)->count();
       $l1730 = Profiles::age('Laki-Laki',17,30)->count();
       $l3060 = Profiles::age('Laki-Laki',30,60)->count();
       $l60 = Profiles::age('Laki-Laki',60,150)->count();

       $tidakSekolah = DB::table('profiles')->whereNull('pendidikan')->count();
       $sd = DB::table('profiles')->where('pendidikan','SD')->count();
       $smp = DB::table('profiles')->where('pendidikan', 'SMP')->count();
       $sma = DB::table('profiles')->where('pendidikan', 'SMA')->count();
       $diploma = DB::table('profiles')->whereIn('pendidikan',['D1','D2','D3'])->count();
       $sarjana = DB::table('profiles')->whereIn('pendidikan',['S1','S2','S3'])->count();

       $kawin = DB::table('profiles')->where('status_perkawinan','KAWIN')->count();
       $belumKawin = DB::table('profiles')->where('status_perkawinan','BELUM KAWIN')->count();
       $cerai = DB::table('profiles')->where('status_perkawinan','CERAI')->count();
       $ceraiMati = DB::table('profiles')->where('status_perkawinan','CERAI MATI')->count();

       $bekerja = DB::table('profiles')->whereNotNull('jenis_pekerjaan')->count();
       $tidakBekerja = DB::table('profiles')->whereIn('jenis_pekerjaan',['IBU RUMAH TANGGA','PELAJAR/MAHASISWA'])->count();
    //    dd($pendidikanSarjana);
        // dd($bekerja);
        return view('UserPages.layout.statistik', compact('p05','p517','p1730','p3060','p60','l05','l517','l1730','l3060','l60','tidakSekolah','sd','smp','sma','diploma','sarjana','kawin','belumKawin','cerai','ceraiMati','bekerja','tidakBekerja'));
    }
}
