<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KTM;
use App\Models\SKU;
use App\Models\SKULuar;
use App\Models\Profiles;
use App\Models\BelumMenikah;
use Illuminate\Http\Request;
use App\Models\DomisiliDalam;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\DB;
use App\Models\SuratPenghasilanOrtu;
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
                    <a href="/'.auth()->user()->role.'/ktm/'.$ktm->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <a href="/'.auth()->user()->role.'/ktm/'.$ktm->id.'" class="btn mx-3 btn-primary">Preview</a>
                    <a href="/'.auth()->user()->role.'/ktm/'. $ktm->id.'/print" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                    </div>';
        })
        ->addColumn('created_at', function($ktm){
            return Carbon::parse($ktm['created_at'])->isoFormat('dddd, D MMMM Y');
        })
        ->rawColumns(['action','created_at'])
        ->make(true);
    }

    public function createKTM(){
        $data = DB::table('kartu_keluarga')->join('profiles','kartu_keluarga.id','=','profiles.kartu_keluarga_id')
                                           ->where('profiles.id','=',auth()->user()->profiles_id)->get();
    
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
         Alert::success('Berhasil','Silahkan mengunjungi kantor Desa!');
        return redirect('/layanan-desa');
    }


    public function editKTM($id){
       $data =  KTM::find($id);
       return view('admin.contents.ktm.edit', compact('data'));
    }

    public function updateKTM(Request $request, $id){

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

        KTM::find($id)->update([
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
        ]);

        Alert::success('Berhasil!', 'Data berhasil diupdate!');
        return redirect('/'.auth()->user()->role.'/ktm');
    }

    public function showKTM($id){
        $data = KTM::find($id);

        return view('admin.contents.ktm.show', compact('data'));
    }

    public function printKTM($id){
        $data = DB::table('ktm')->where('id','=',$id)->get();
        foreach ($data as $item) {
            $tanggal_dibuat =  Carbon::parse($item->created_at)->isoFormat('dddd D MMMM Y');
        }
        return view('admin.contents.ktm.print',compact('data','tanggal_dibuat'));
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
                    <a href="/'.auth()->user()->role.'/sku-dalam/'.$skuDalam->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    <a href="/'.auth()->user()->role.'/sku-dalam/'.$skuDalam->id.'/show" class="btn mx-3 btn-primary">Preview</a>
                    <a href="/'.auth()->user()->role.'/sku-dalam/'.$skuDalam->id.'/print" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                    </div>';
        })
        ->addColumn('created_at', function($skuDalam){
            return Carbon::parse($skuDalam['created_at'])->isoFormat('dddd, D MMMM Y');
        })
        ->rawColumns(['action','created_at'])
        ->make(true);
    }

    

    public function createSKU(){
       $data = DB::table('kartu_keluarga')->join('profiles','kartu_keluarga.id','=','profiles.kartu_keluarga_id')
                                           ->where('profiles.id','=',auth()->user()->profiles_id)->get();

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


    public function editSKU($id){
        $data = SKU::find($id);

        return view('admin.contents.sku-dalam.edit', compact('data'));
    }

    public function updateSKU(Request $request, $id){
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

        SKU::find($id)->update([
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
        ]);

        Alert::success('Berhasil!','Data berhasil diupdate!');
        return redirect('/'.auth()->user()->role.'/sku-dalam');
    }

    public function showSKU($id){
        $data = SKU::find($id);
        return view('admin.contents.sku-dalam.show', compact('data'));
    }

    public function printSKU($id){
        $data = DB::table('sku')->where('id','=',$id)->get();

        foreach ($data as $item) {
            $tanggal_dibuat = Carbon::parse($item->created_at)->isoFormat('dddd D MMMM Y');
        }
        // dd($data);
        return view('admin.contents.sku-dalam.print', compact('data','tanggal_dibuat'));
    }


    public function skuLuar(Request $request){
        $skuLuar = skuLuar::all();
        if ($request->ajax()) {
            return datatables()->of($skuLuar)
            ->addIndexColumn()
            ->addColumn('nik', function($skuLuar){
                return Crypt::decrypt($skuLuar->nik);
            })
            ->addColumn('action', function($skuLuar){
                return ' <div class="d-flex">   
                        <a href="/'.auth()->user()->role.'/sku-luar/'.$skuLuar->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                        <a href="/'.auth()->user()->role.'/sku-luar/'.$skuLuar->id.'" class="btn mx-3 btn-primary">Preview</a>
                        <a href="/'.auth()->user()->role.'/sku-luar/'.$skuLuar->id.'/print" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                        </div>';
            })
            ->addColumn('created_at', function($skuLuar){
                return Carbon::parse($skuLuar->created_at)->format('d M Y');
            })
            ->rawColumns(['nik','action'])
            ->make(true);
        }

        return view('admin.contents.sku-luar.index');
    }

    public function createSkuLuar(){
        return view('UserPages.layout.sku-luar');
    }

    public function storeSkuLuar(Request $request){

        $request->validate([
            'jenis_usaha' => 'required',
            'penghasilan' => 'required',
            'tahun_berdiri' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'nik' => 'required|max:16|min:16',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'alamat_usaha' => 'required',
            'alamat_asal' => 'required',
        ]);

        SKULuar::create([
            'jenis_usaha' => $request->jenis_usaha,
            'penghasilan' => $request->penghasilan,
            'tahun_berdiri' => $request->tahun_berdiri,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'nik' => Crypt::encrypt($request->nik),
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'alamat_usaha' => $request->alamat_usaha,
            'alamat_asal' => $request->alamat_asal,
        ]);

        Alert::success('Berhasil!', 'Silahkan ambil surat ke kantor desa');
        return redirect('/layanan-desa');
    }

    public function editSkuLuar($id){
        $data = SKULuar::find($id);
        return view('admin.contents.sku-luar.edit', compact('data'));
    }

    public function updateSkuLuar(Request $request, $id){
        $request->validate([
            'jenis_usaha' => 'required',
            'penghasilan' => 'required',
            'tahun_berdiri' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'nik' => 'required|max:16|min:16',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'alamat_usaha' => 'required',
            'alamat_asal' => 'required',
        ]);

        SKULuar::find($id)->update([
            'jenis_usaha' => $request->jenis_usaha,
            'penghasilan' => $request->penghasilan,
            'tahun_berdiri' => $request->tahun_berdiri,
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'nik' => Crypt::encrypt($request->nik),
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'agama' => $request->agama,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'alamat_usaha' => $request->alamat_usaha,
            'alamat_asal' => $request->alamat_asal,
        ]);

        Alert::success('Berhasil dirubah!');
        return redirect('/'. auth()->user()->role . '/sku-luar');
    }

    public function showSkuLuar($id){
        $data = SKULuar::find($id);
        return view('admin.contents.sku-luar.show', compact('data'));
    }

    public function printSkuLuar($id){
        $data = SKULuar::find($id);
        $tanggal_dibuat = Carbon::parse($data['created_at'])->isoFormat('dddd D MMMM Y');
        return view('admin.contents.sku-luar.print', compact('data','tanggal_dibuat'));
    }

    public function destroySkuLuar($id){
        SKULuar::find($id)->delete();
        Alert::success('Berhasil dihapus!');
        return redirect('/'.auth()->user()->role.'/sku-luar');
    }

    public function createSuratPenghasilanOrtu(){
        $profiles = Profiles::where('id',auth()->user()->profiles_id)->first();
        $tanggal_lahir = Carbon::parse($profiles->tanggal_lahir)->isoFormat('D-MM-Y');
        $kk = KartuKeluarga::where('id', $profiles->kartu_keluarga_id)->first();
        $alamat = Crypt::decrypt($kk->alamat) . ' Rt.' . $kk->rt . ' Rw.' . $kk->rw . ' Desa/Kel.' . $kk->desa . ' Kec.' . $kk->kecamatan . ' Kab.' . $kk->kabupaten;

        return view('UserPages.layout.surat-penghasilan-ortu', compact('profiles','tanggal_lahir','alamat'));
    }


    public function suratPenghasilanOrtu(Request $request){
        $suratPenghasilanOrtu = SuratPenghasilanOrtu::all();
        if ($request->ajax()) {
            return datatables()->of($suratPenghasilanOrtu)
            ->addIndexColumn()
            ->addColumn('action', function($suratPenghasilanOrtu){
                return ' <div class="d-flex">   
                        <a href="/'.auth()->user()->role.'/surat-penghasilan-orang-tua/'.$suratPenghasilanOrtu->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                        <a href="/'.auth()->user()->role.'/surat-penghasilan-orang-tua/'.$suratPenghasilanOrtu->id.'" class="btn mx-3 btn-primary">Preview</a>
                        <a href="/'.auth()->user()->role.'/surat-penghasilan-orang-tua/'.$suratPenghasilanOrtu->id.'/print" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                        </div>';
            })
            ->addColumn('created_at', function($suratPenghasilanOrtu){
                return Carbon::parse($suratPenghasilanOrtu->created_at)->format('d M Y');
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.contents.suratPenghasilanOrtu.index');
    }

    public function storeSuratPenghasilanOrtu(Request $request){
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'nik' => 'required',
            'kewarganegaraan' => 'required',
            'penghasilan' => 'required',
            'ejaan_penghasilan' => 'required',
            'anggota' => 'required',
            'ejaan_anggota' => 'required',
            'alamat' => 'required',
            'nama_anak' => 'required',
            'ttl_anak' => 'required',
            'jk_anak' => 'required',
            'pekerjaan_anak' => 'required',
            'nik_anak' => 'required',
            'alamat_anak' => 'required',
           ]);
    
           SuratPenghasilanOrtu::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'agama' => $request->agama,
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'nik' => $request->nik,
            'kewarganegaraan' => $request->kewarganegaraan,
            'penghasilan' => $request->penghasilan,
            'ejaan_penghasilan' => $request->ejaan_penghasilan,
            'anggota' => $request->anggota,
            'ejaan_anggota' => $request->ejaan_anggota,
            'alamat' => $request->alamat,
            'nama_anak' => $request->nama_anak,
            'ttl_anak' => $request->ttl_anak,
            'jk_anak' => $request->jk_anak,
            'pekerjaan_anak' => $request->pekerjaan_anak,
            'nik_anak' => $request->nik_anak,
            'alamat_anak' => $request->alamat_anak,
           ]);
    
           Alert::success('Berhasil!','Silahkan ke kantor desa untuk pengambilan surat');
           return redirect('/layanan-desa');
    }

    public function editSuratPenghasilanOrtu($id){

       $data = SuratPenghasilanOrtu::find($id);

       return view('admin.contents.suratPenghasilanOrtu.edit', compact('data'));

    }

    public function updateSuratPenghasilanOrtu(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'pekerjaan' => 'required',
            'nik' => 'required',
            'kewarganegaraan' => 'required',
            'penghasilan' => 'required',
            'ejaan_penghasilan' => 'required',
            'anggota' => 'required',
            'ejaan_anggota' => 'required',
            'alamat' => 'required',
            'nama_anak' => 'required',
            'ttl_anak' => 'required',
            'jk_anak' => 'required',
            'pekerjaan_anak' => 'required',
            'nik_anak' => 'required',
            'alamat_anak' => 'required',
        ]);

        SuratPenghasilanOrtu::find($id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'agama' => $request->agama,
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'nik' => $request->nik,
            'kewarganegaraan' => $request->kewarganegaraan,
            'penghasilan' => $request->penghasilan,
            'ejaan_penghasilan' => $request->ejaan_penghasilan,
            'anggota' => $request->anggota,
            'ejaan_anggota' => $request->ejaan_anggota,
            'alamat' => $request->alamat,
            'nama_anak' => $request->nama_anak,
            'ttl_anak' => $request->ttl_anak,
            'jk_anak' => $request->jk_anak,
            'pekerjaan_anak' => $request->pekerjaan_anak,
            'nik_anak' => $request->nik_anak,
            'alamat_anak' => $request->alamat_anak,
        ]);

        Alert::success('Berhasil!','Data surat berhasil dirubah!');
        return redirect('/'.auth()->user()->role.'/surat-penghasilan-orang-tua');
    }

    public function showSuratPenghasilanOrtu($id){
        $data = SuratPenghasilanOrtu::find($id);

        return view('admin.contents.suratPenghasilanOrtu.show', compact('data'));
    }

    public function printSuratPenghasilanOrtu($id){
        $data = SuratPenghasilanOrtu::find($id);
        $tanggal_dibuat = Carbon::parse($data['created_at'])->isoFormat('dddd D MMMM Y');
        return view('admin.contents.suratPenghasilanOrtu.print', compact('data', 'tanggal_dibuat'));
    }

    public function suratDomisiliDalam(Request $request){
        $domisiliDalam = DomisiliDalam::all();
        if ($request->ajax()) {
            return datatables()->of($domisiliDalam)
            ->addIndexColumn()
            ->addColumn('action', function($domisiliDalam){
                return ' <div class="d-flex">   
                        <a href="/'.auth()->user()->role.'/domisili-dalam/'.$domisiliDalam->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                        <a href="/'.auth()->user()->role.'/domisili-dalam/'.$domisiliDalam->id.'" class="btn mx-3 btn-primary">Preview</a>
                        <a href="/'.auth()->user()->role.'/domisili-dalam/'.$domisiliDalam->id.'/print" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                        </div>';
            })
            ->addColumn('created_at', function($domisiliDalam){
                return Carbon::parse($domisiliDalam->created_at)->format('d M Y');
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.contents.domisili.index');
    }

    public function createSuratDomisiliDalam(){
        $profiles = Profiles::where('id',auth()->user()->profiles_id)->first();
        $ttl = $profiles->tempat_lahir . ", " . Carbon::parse($profiles->tanggal_lahir)->isoFormat('D-MM-Y');
        $kk = KartuKeluarga::where('id', $profiles->kartu_keluarga_id)->first();
        $alamat = Crypt::decrypt($kk->alamat) . ' Rt.' . $kk->rt . ' Rw.' . $kk->rw . ' Desa/Kel.' . $kk->desa . ' Kec.' . $kk->kecamatan . ' Kab.' . $kk->kabupaten;
        return view('UserPages.layout.domisili-dalam', compact('profiles','ttl','alamat'));
    }

    public function storeSuratDomisiliDalam(Request $request){
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',

        ]);

        DomisiliDalam::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
        ]);

        Alert::success('Berhasil!','Silahkan mengunjungi kantor desa untuk cetak surat!');
        return redirect('/layanan-desa');
    }

    public function editSuratDomisiliDalam($id){
        $data = DomisiliDalam::find($id);
        return view('admin.contents.domisili.edit', compact('data'));
    }

    public function updateSuratDomisiliDalam(Request $request, $id){
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'kewarganegaraan' => 'required',

        ]);

        DomisiliDalam::find($id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
        ]);

        Alert::success('Berhasil','Data berhasil diupdate!');
        return redirect('/'.auth()->user()->role.'/domisili-dalam/'.$id.'/edit');
    }

    public function showSuratDomisiliDalam($id){
        $data = DomisiliDalam::find($id);
        return view('admin.contents.domisili.show', compact('data'));
    }

    public function printSuratDomisiliDalam($id){
        $data = DomisiliDalam::find($id);
        $data->update([
            'masa_berlaku' => Carbon::now()->addMonths(3)
        ]);
        
        $masa_berlaku = Carbon::parse($data->masa_berlaku)->isoFormat('dddd, D MMMM Y');
        $tanggal_dibuat = Carbon::parse($data['created_at'])->isoFormat('dddd, D MMMM Y');
        return view('admin.contents.domisili.print', compact('data', 'masa_berlaku','tanggal_dibuat'));
    }

    public function suratBelumMenikah(Request $request){
        $belumMenikah = BelumMenikah::all();
        if ($request->ajax()) {
            return datatables()->of($belumMenikah)
            ->addIndexColumn()
            ->addColumn('action', function($belumMenikah){
                return ' <div class="d-flex">   
                        <a href="/'.auth()->user()->role.'/belum-menikah/'.$belumMenikah->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                        <a href="/'.auth()->user()->role.'/belum-menikah/'.$belumMenikah->id.'" class="btn mx-3 btn-primary">Preview</a>
                        <a href="/'.auth()->user()->role.'/belum-menikah/'.$belumMenikah->id.'/print" class="btn mx-3 btn-primary"><i class="fa fa-print"></i></a>
                        </div>';
            })
            ->addColumn('created_at', function($belumMenikah){
                return Carbon::parse($belumMenikah->created_at)->format('d M Y');
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.contents.belum-nikah.index');
    }

    public function createSuratBelumMenikah(){
        $profiles = Profiles::where('id',auth()->user()->profiles_id)->first();
        $ttl = $profiles->tempat_lahir . ", " . Carbon::parse($profiles->tanggal_lahir)->isoFormat('D-MM-Y');
        $kk = KartuKeluarga::where('id', $profiles->kartu_keluarga_id)->first();
        $alamat = Crypt::decrypt($kk->alamat) . ' Rt.' . $kk->rt . ' Rw.' . $kk->rw . ' Desa/Kel.' . $kk->desa . ' Kec.' . $kk->kecamatan . ' Kab.' . $kk->kabupaten;
        return view('UserPages.layout.belum-menikah', compact('profiles','ttl','alamat'));
    }

    public function storeSuratBelumMenikah(Request $request){
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',

        ]);

        BelumMenikah::create([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Berhasil!','Silahkan mengunjungi kantor desa untuk cetak surat!');
        return redirect('/layanan-desa');

    }

    public function editSuratBelumMenikah($id){
        $data = BelumMenikah::find($id);
        return view('admin.contents.belum-nikah.edit', compact('data'));
    }

    public function updateSuratBelumMenikah(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',

        ]);

        BelumMenikah::find($id)->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'nik' => $request->nik,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Berhasil', 'Data berhasil diupdate!');
        return redirect('/'.auth()->user()->role.'/belum-menikah/'.$id.'/edit');

    }

    public function showSuratBelumMenikah($id){
        $data = BelumMenikah::find($id);
        return view('admin.contents.belum-nikah.show', compact('data'));
    }

    public function printSuratBelumMenikah($id){

        $data = BelumMenikah::find($id);
        $tanggal_dibuat = Carbon::parse($data['created_at'])->isoFormat('dddd, D MMMM Y');
        return view('admin.contents.belum-nikah.print', compact('data','tanggal_dibuat'));
    }
      

}