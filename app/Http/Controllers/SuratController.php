<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KTM;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class SuratController extends Controller
{
    public function ktm(){
        return view('admin.contents.ktm.index');
    }

    public function jsonKTM(){
        $ktm = KTM::select('*')->orderBy('created_at','desc')->get();
        return datatables()->of($ktm)
        ->addIndexColumn()
        ->addColumn('action', function($ktm){
            return ' <div class="d-flex">   
                    <a href="/admin/ktm/'.$ktm->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <a href="/admin/ktm/'.$ktm->id.'" class="btn mx-3 btn-primary">Preview</a>
                    <a href="/admin/ktm/'.$ktm->id.'" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                    </div>';
        })
        ->addColumn('created_at', function($ktm){
            return Carbon::parse($ktm['created_at'])->isoFormat('dddd, D MMMM Y');
        })
        ->rawColumns(['action','created_at'])
        ->make(true);
    }

    public function createKTM(){
        $data = DB::table('kartu_keluarga')->join('profiles','kartu_keluarga.id','=','profiles.kartu_keluarga_id')->get();

        foreach ($data as $item) {
            $alamat = Crypt::decrypt($item->alamat);
            $nik = Crypt::decrypt($item->nik);
            $tanggal_lahir = Carbon::parse($item->tanggal_lahir)->format('d m Y');
        }
        // dd($nik);
        return view('UserPages.layout.ktm', compact('data','alamat','nik','tanggal_lahir'));
    }


    public function storeKTM(Request $request){
        // dd($request);
        $request->validate([
            'namaOrtu' => 'required',
            'ttlOrtu' => 'required',
            'jkOrtu' => 'required',
            'nik' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'namaAnak' => 'required',
            'ttlAnak' => 'required',
            'jkAnak' => 'required',
            'sekolah' => 'required',
        ]);

        DB::table('ktm')->insert([
            'users_id' => auth()->user()->id,
            'nama_ortu' => $request->namaOrtu,
            'ttl_ortu' => $request->ttlOrtu,
            'jk_ortu' => $request->jkOrtu,
            'nik' => $request->nik,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'nama_anak' => $request->namaAnak,
            'ttl_anak' => $request->ttlAnak,
            'jk_anak' => $request->jkAnak,
            'sekolah' => $request->sekolah,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect('/layanan-desa');
    }

    public function showKTM($id){
        $data = DB::table('ktm')->where('id','=',$id)->get();
        foreach ($data as $item) {
            $tanggal_dibuat =  Carbon::parse($item->created_at)->isoFormat('dddd D MMMM Y');
        }
        return view('admin.contents.ktm.show',compact('data','tanggal_dibuat'));
    }

    public function skuDalam(){
        return view('admin.contents.sku-dalam.index');
    }

    public function skuDalamJson(){
        $skuDalam = SKU::select('*')->orderBy('created_at','desc')->get();
        return datatables()->of($skuDalam)
        ->addIndexColumn()
        ->addColumn('action', function($skuDalam){
            return ' <div class="d-flex">   
                    <a href="/admin/sku-dalam/'.$skuDalam->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <a href="/admin/sku-dalam/'.$skuDalam->id.'" class="btn mx-3 btn-primary">Preview</a>
                    <a href="/admin/sku-dalam/'.$skuDalam->id.'" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                    </div>';
        })
        ->addColumn('created_at', function($skuDalam){
            return Carbon::parse($skuDalam['created_at'])->isoFormat('dddd, D MMMM Y');
        })
        ->rawColumns(['action','created_at'])
        ->make(true);
    }

    

    public function createSKU(){
        $KK = DB::table('profiles')->where('profiles.id','=', auth()->user()->profiles_id)->join('users','profiles.id','=','users.profiles_id')->get('kartu_keluarga_id');
        foreach ($KK as $item) {
            $idKK = $item->kartu_keluarga_id;
        }
        $data = DB::table('kartu_keluarga')->where('kartu_keluarga.id','=',$idKK)->join('profiles','kartu_keluarga.id','=','profiles.kartu_keluarga_id')->get();

        foreach ($data as $item) {
            $nama = $item->nama;
            $nik = Crypt::decrypt($item->nik);
            $ttl = $item->tempat_lahir.', '. Carbon::parse($item->tanggal_lahir)->format('d m Y');
            $jk = $item->jk;
            $agama = $item->agama;
            $pekerjaan = $item->jenis_pekerjaan;
            $alamat = Crypt::decrypt($item->alamat).' RT.'.$item->rt . '/' . $item->rw . ' Desa ' . $item->desa . ' Kec. ' . $item->kecamatan . ',' . $item->kabupaten;
        }

        // dd($alamat);
        return view('UserPages.layout.sku', compact('nama','nik','ttl','jk','agama','pekerjaan','alamat'));
    }

    public function storeSKU(Request $request){
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'jenis_usaha' => 'required',
            'penghasilan' => 'required',
            'tahun' => 'required',
        ]);

        DB::table('sku')->insert([
            'users_id' => auth()->user()->id,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'jenis_usaha' => $request->jenis_usaha,
            'penghasilan' => $request->penghasilan,
            'tahun' => $request->tahun,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        Alert::success('Berhasil','Silahkan mengunjungi kantor Desa!');

        return redirect('/layanan-desa');
    }

    public function showSKU($id){
        $data = DB::table('sku')->where('id','=',$id)->get();

        foreach ($data as $item) {
            $tanggal_dibuat = Carbon::parse($item->created_at)->isoFormat('dddd D MMMM Y');
        }
        // dd($data);
        return view('admin.contents.sku-dalam.show', compact('data','tanggal_dibuat'));
    }
}
