<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KTM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

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

    public function createSKU(){
        $data = DB::table('profiles')->join('users','profiles.id','=','users.profiles_id')->where('users.id','=', auth()->user()->id)->get();
        // dd($data);
        foreach ($data as $item) {
            $nik = Crypt::decrypt($item->nik);
            $ttl = $item->tempat_lahir . ', ' . Carbon::parse($item->tanggal_lahir)->format('d m Y');
            
        }

        dd($ttl);
        return view('UserPages.layout.sku');
    }

    public function storeSKU(Request $request){

    }
}
