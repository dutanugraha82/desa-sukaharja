<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profiles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.contents.profiles.index');
    }

    public function create(){
       $data = KartuKeluarga::all();
        return view('admin.contents.profiles.create', compact('data'));
    }

    public function store(Request $request){
        $tanggalLahir = Carbon::parse($request->tanggalLahir)->format('dmY');
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:profiles',
            'jk' => 'required',
            'kartu_keluarga_id' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
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
        return redirect('/admin');
    }
}
