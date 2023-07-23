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

       $tidakSekolah = DB::table('profiles')->whereIn('pendidikan',['-','BELUM SEKOLAH','BELUM TAMAT SD/SEDERAJAT','TIDAK/BELUM SEKOLAH','TIDAK/BLM SEKOLAH','TIDAK SEKOLAH'])->count();
       $sd = DB::table('profiles')->where('pendidikan','TAMAT SD/SEDERAJAT')->count();
       $smp = DB::table('profiles')->whereIn('pendidikan', ['SLTP/SEDERAJAT','STLP/SEDERAJAT'])->count();
       $sma = DB::table('profiles')->whereIn('pendidikan', ['SLTA/SEDERAJAT','STLA/SEDERAJAT'])->count();
       $diploma = DB::table('profiles')->whereIn('pendidikan',['AKADEMI/DIPLOMA III/SARJANA MUDA','AKADEMI DIMPLOMA 3','AKADEMI/DIPLOMA III/S.MUDA','D III/SARJANA MUDA','DIPLOMA I/II','DIPLOMA III',''])->count();
       $sarjana = DB::table('profiles')->whereIn('pendidikan',['DIPLOMA IV','DIPLOMA IV/STRATA I','STRATA-II','STRATA II',''])->count();

       $kawin = DB::table('profiles')->whereIn('status_perkawinan',['KAWIN','KAWIN TERCATAT','KAWIN BELUM TERCATAT'])->count();
       $belumKawin = DB::table('profiles')->where('status_perkawinan','BELUM KAWIN')->count();
       $cerai = DB::table('profiles')->whereIn('status_perkawinan',['CERAI','CERAI TERCATAT','CERAI HIDUP BELUM TERCATAT','CERAI HIDUP','CERAI BELUM TERCATAT'])->count();
       $ceraiMati = DB::table('profiles')->where('status_perkawinan','CERAI MATI')->count();

       $bekerja = DB::table('profiles')->whereNotIn('jenis_pekerjaan', ['IBU RUMAH TANGGA','PELAJAR/MAHASISWA','BELUM/TIDAK BEKERJA','BELUM BEKERJA','TIDAK BEKERJA','PENSIUNAN','PELAJAR'])->count();
       $tidakBekerja = DB::table('profiles')->whereIn('jenis_pekerjaan',['IBU RUMAH TANGGA','PELAJAR/MAHASISWA','BELUM/TIDAK BEKERJA','BELUM BEKERJA','TIDAK BEKERJA','PENSIUNAN','PELAJAR'])->count();
    //    dd($pendidikanSarjana);
        // dd($bekerja);
        return view('UserPages.layout.statistik', compact('p05','p517','p1730','p3060','p60','l05','l517','l1730','l3060','l60','tidakSekolah','sd','smp','sma','diploma','sarjana','kawin','belumKawin','cerai','ceraiMati','bekerja','tidakBekerja'));
    }
}
