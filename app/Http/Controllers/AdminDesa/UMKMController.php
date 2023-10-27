<?php

namespace App\Http\Controllers\AdminDesa;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UMKMController extends Controller
{
    public function json(){
        $umkm = UMKM::select('*')->orderBy('created_at','desc')->where('status_validasi',0)->get();
        return datatables()->of($umkm)
                ->addIndexColumn()
                ->addColumn('action', function($umkm){
                    return '
                    <a href="/admin/umkm/'.$umkm->id.'" class="btn btn-primary d-block mx-auto" style="width:100%;">Lihat Data</a>
                    ';
                })
                ->addColumn('nik', function($umkm){
                    return Crypt::decrypt($umkm->nik);
                })
                ->rawColumns(['action','nik'])
                ->make(true);
    }

    public function jsonValidasiUMKM(){
        $umkm = UMKM::select('*')->orderBy('created_at','desc')->where('status_validasi',1)->get();
        return datatables()->of($umkm)
                ->addIndexColumn()
                ->addColumn('action', function($umkm){
                    return ' <div class="d-flex justify-content-around">   
                    <a href="/'.auth()->user()->role.'/umkm/'.$umkm->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <form action="/'.auth()->user()->role.'/umkm/'.$umkm->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <input type="hidden" name="logo" value="'.$umkm->logo.'">
                        <button class="btn  btn-danger" onclick="javascript: return confirm(\'Hapus '.$umkm->nama_umkm.' ?\')">Delete</button>
                    </form>
                    </div>';
                })
                ->addColumn('nik', function($umkm){
                    return Crypt::decrypt($umkm->nik);
                })
                ->rawColumns(['action','nik'])
                ->make(true);
    }

    public function index(){
        return view('admin.contents.umkm.index');
    }

    public function create(){
        return view('UserPages.layout.pengajuan-umkm');
    }
    // store function in LayananDesaController at storePengajuanUMKM class

    public function show($id){
        $umkm = UMKM::find($id);
        $gambarProduk = DB::table('gambar_produk')->where('umkm_id',$id)->get();

        return view('admin.contents.umkm.show', compact('umkm','gambarProduk'));
    }

    public function edit($id){
        $umkm = UMKM::find($id);
        $gambarProduk = DB::table('gambar_produk')->where('umkm_id',$id)->get();

        return view('admin.contents.umkm.edit', compact('umkm','gambarProduk'));
    }

    public function validasiUMKM($id){
        UMKM::find($id)->update([
            'status_validasi' => 1,
        ]);

        Alert::success('Berhasil Divalidasi!');
        return redirect('/admin/umkm');
    }

    public function destroy(Request $request, $id){
        $gambarProduk =  DB::table('gambar_produk')->where('umkm_id',$id)->get();
        foreach ($gambarProduk as $item) {
            Storage::delete($item->gambar_produk);
        }
        DB::table('gambar_produk')->where('umkm_id',$id)->delete();
        Storage::delete($request->logo);
        UMKM::find($id)->delete();
        Alert::success('Data Terhapus!');
        return redirect('/admin/umkm');
    }
}
