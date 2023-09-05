<?php

namespace App\Http\Controllers\AdminDesa;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UMKMController extends Controller
{
    public function json(){
        $umkm = UMKM::select('*')->orderBy('created_at','desc')->get();
        return datatables()->of($umkm)
                ->addIndexColumn()
                ->addColumn('action', function($umkm){
                    return ' <div class="d-flex">   
                    <a href="/admin/umkm/'.$umkm->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <a href="/admin/umkm/'.$umkm->id.'" class="btn  mx-3 btn-primary">Preview</a>
                    <form action="/admin/umkm/'.$umkm->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field("DELETE").'
                        <button class="btn  btn-danger" onclick="javascript: return confirm(\'Hapus '.$umkm->nama_umkm.' ?\')">Delete</button>
                    </form>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function index(){
        return view('admin.contents.umkm.index');
    }

    public function edit($id){
        $umkm = UMKM::find($id);
        $gambarProduk = DB::table('gambar_produk')->where('umkm_id',$id)->get();

        return view('admin.contents.umkm.edit', compact('umkm','gambarProduk'));
    }

    public function destroy(Request $request, $id){
        $gambarProduk =  DB::table('gambar_produk')->where('umkm_id',$id)->get();
        foreach ($gambarProduk as $item) {
            Storage::delete($item->gambar_produk);
        }
        DB::table('gambar_produk')->where('umkm_id',$id)->delete();
        UMKM::find($id)->delete();
        Alert::success('Data Terhapus!');
        return redirect('/admin/umkm');
    }
}
