<?php

namespace App\Http\Controllers\AdminDesa;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\GambarProduk;
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

    public function update(Request $request, $id){
        // dd($request);
        $data = UMKM::find($id);
        if ($request->logo_baru) {

            $request->validate([
                'nik' => 'required|min:16|max:16',
                'nama_pemilik' => 'required',
                'nama_umkm' => 'required',
                'nohp' => 'required',
                'logo_baru' => 'image',
                'alamat' => 'required',
                'deskripsi' => 'required',
            ]);

            $logoLama = $data->logo;

            $data->update([
                'nik' => Crypt::encrypt( $request->nik),
                'nama_pemilik' => $request->nama_pemilik,
                'nama_umkm' => $request->nama_umkm,
                'nohp' => "62" . $request->nohp,
                'logo' => $request->file('logo_baru')->store('logo-umkm'),
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
            ]);

            Storage::delete($logoLama);
            Alert::success('Berhasil!','Data Berhasil Diupdate');
            return redirect('/'.auth()->user()->role.'/umkm');

        } else {
            $request->validate([
                'nik' => 'required|min:16|max:16',
                'nama_pemilik' => 'required',
                'nama_umkm' => 'required',
                'nohp' => 'required',
                'alamat' => 'required',
                'deskripsi' => 'required',
            ]);

            $data->update([
                'nik' => Crypt::encrypt( $request->nik),
                'nama_pemilik' => $request->nama_pemilik,
                'nama_umkm' => $request->nama_umkm,
                'nohp' => "62" . $request->nohp,
                'alamat' => $request->alamat,
                'deskripsi' => $request->deskripsi,
            ]);

            Alert::success('Berhasil!','Data Berhasil Diupdate');
            return redirect('/'.auth()->user()->role.'/umkm');
        }
           
    }

    public function editGambarProduk($id){
        $gambar = GambarProduk::find($id);
        return view('admin.contents.umkm.gambar.edit', compact('gambar'));
    }

    public function updateGambarProduk(Request $request, $id){
        $request->validate([
            'gambar_produk' => 'image',
        ]);

       $gambar = GambarProduk::find($id);
       $gambarLama = $gambar->gambar_produk;

       $gambar->update([
        'gambar_produk' => $request->file('gambar_produk')->store('produk-umkm'),
       ]);

       Storage::delete($gambarLama);

       Alert::success('Berhasil!','Gambar produk diubah');
       return redirect('/'.auth()->user()->role.'/umkm/'.$gambar->umkm_id.'/edit');

    }

    public function hapusGambarProduk($id){
        $gambar = GambarProduk::find($id);
        Storage::delete($gambar->gambar_produk);

        $gambar->delete();
        Alert::success('Berhasil!','gambar berhasil dihapus');
        return redirect('/'.auth()->user()->role.'/umkm/'.$gambar->umkm_id.'/edit');
    }

    public function validasiUMKM($id){
        UMKM::find($id)->update([
            'status_validasi' => 1,
        ]);

        Alert::success('Berhasil Divalidasi!');
        return redirect('/'.auth()->user()->role.'/umkm');
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
        return redirect('/'.auth()->user()->role.'/umkm');
    }
}
