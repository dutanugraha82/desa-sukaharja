<?php

namespace App\Http\Controllers;

use App\Models\GambarProduk;
use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        $image = $request->file('gambar_produk')->store('produk-umkm');
        DB::table('temporary_image')->insert([
            'users_id' => Auth::id(),
            'image' => $image,
        ]);

        return $image;

    }

    public function deleteFilePond(Request $request){
        $request->validate([
            'image' => 'image',
        ]);
        DB::table('temporary_image')->where('image',$request->image)->delete(); //filepond always parsing the image file with object named image.
        Storage::delete($request->image);
    }
    public function pengajuanUMKM(){
        return view('UserPages.layout.pengajuan-umkm');
    }

    public function storePengajuanUMKM(Request $request){
        $request->validate([
            'nik' => 'required|min:16|max:16',
            'nama_pemilik' => 'required',
            'nama_umkm' => 'required',
            'nohp' => 'required',
            'logo' => 'image',
            'alamat' => 'required',
            'deskripsi' => 'required',
        ]);

       $id = UMKM::create([
            'nik' => $request->nik,
            'nama_pemilik' => $request->nama_pemilik,
            'nama_umkm' => $request->nama_umkm,
            'nohp' => $request->nohp,
            'logo' => $request->file('logo')->store('logo-umkm'),
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'status_validasi' => 0
        ])->id;
        
        $gambarProduk = DB::table('temporary_image')->where('users_id',auth()->user()->id)->get();

        foreach ($gambarProduk as $item) {
            GambarProduk::create([
                'umkm_id' => $id,
                'gambar_produk' => $item->image
            ]);

        }
        DB::table('temporary_image')->where('users_id',auth()->user()->id)->delete();

        Alert::success('Berhasil!','Silahkan Menunggu Validasi Pelayanan Desa');
        return redirect('/');


    }
}
