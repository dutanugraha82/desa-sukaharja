<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LayananDesaController extends Controller
{
    public function index(){
        return view('UserPages.layout.layanan-desa');
    }

    public function dataPenduduk(){
        $data = DB::table('profiles')->orderBy('created_at','desc')->get();
        if(request()->ajax()){
            return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
        }

    return view('UserPages.layout.data-penduduk');
    }

    public function filePond(Request $request){
        $image = $request->file('gambar_produk');
        DB::table('temporary_image')->insert([
            'users_id' => Auth::id(),
            'image' => $image,
        ]);

        return $image;

    }
    public function pengajuanUMKM(){
        return view('UserPages.layout.pengajuan-umkm');
    }

    public function storePengajuanUMKM(Request $request){

        
    }
}
