<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profiles;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class SensusController extends Controller
{
    public function createKK(){
        return view('sensus-kk');
    }

    public function storeKK(Request $request){
        $dataKK = DB::table('kk')->where('kk','=',$request->no_kk)->get('kk');
        // dd($dataKK);
        if (!$dataKK->isEmpty()) {
            Alert::error('Gagal!','No KK Sudah Ada');
            return redirect()->back();
        }

        DB::table('kk')->insert([
            'kk' => $request->no_kk,
        ]);
        $request->validate([
            'no_kk' => 'required|unique:kartu_keluarga',
            'kepalaKeluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'pos' => 'required',
            'provinsi' => 'required',
        ]);
        
        KartuKeluarga::create([
            'no_kk' => Crypt::encrypt($request->no_kk),
            'nama_kepala_keluarga' => $request->kepalaKeluarga,
            'alamat' => Crypt::encrypt($request->alamat),
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'pos' => $request->pos,
            'provinsi' => $request->provinsi,
        ]);
        Alert::success('Berhasil!','data kk berhasil ditambahkan, silahkan masukan data penduduk');
        return redirect('/sensus-penduduk');
    }

    public function createPenduduk(){
       $data = DB::table('kartu_keluarga')->orderBy('created_at','desc')->get();
        return view('sensus-penduduk', compact('data'));
    }

    public function storePenduduk(Request $request){
        $tanggalLahir = Carbon::parse($request->tanggalLahir)->format('dmY');
        $nik = DB::table('users')->where('username','=',$request->nik)->get('username');
        if (!$nik->isEmpty()) {
            Alert::error('Gagal','No NIK sudah terdaftar!');
            return back();
        } 
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:profiles|min:16|max:16',
            'jk' => 'required',
            'kartu_keluarga_id' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'status_hubungan_dalam_keluarga' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
        ]);

     $profilesId = Profiles::create([
        'kartu_keluarga_id' => $request->kartu_keluarga_id,
        'nama' => $request->nama,
        'nik' => Crypt::encrypt($request->nik),
        'jk' => $request->jk,
        'tempat_lahir' => $request->tempatLahir,
        'tanggal_lahir' => $request->tanggalLahir,
        'agama' => $request->agama,
        'pendidikan' => $request->pendidikan,
        'jenis_pekerjaan' => $request->jenisPekerjaan,
        'status_perkawinan' => $request->status_perkawinan,
        'status_hubungan_dalam_keluarga' => $request->status_hubungan_dalam_keluarga,
        'nama_ayah' => Crypt::encrypt($request->nama_ayah),
        'nama_ibu' => Crypt::encrypt($request->nama_ibu),
        ])->id;
        
        User::create([
            'username' => $request->nik,
            'password' => Hash::make($tanggalLahir),
            'role' => 'warga',
            'profiles_id' => $profilesId,

        ]);
        Alert::success('Berhasil!','data penduduk berhasil ditambahkan.');
        return redirect('/sensus-penduduk');
    }
}
