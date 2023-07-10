<?php

namespace App\Http\Controllers\AdminDesa;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profiles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.contents.profiles.index');
    }

    public function json(){
        $warga = Profiles::select('*')->orderBy('created_at','desc')->get();
        return datatables()->of($warga)
        ->addIndexColumn()
        ->addColumn('action', function($warga){
            return ' <div class="d-flex">   
                    <a href="/admin/warga/'.$warga->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    
                    </div>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create(){
       $data = KartuKeluarga::all();
        return view('admin.contents.profiles.create', compact('data'));
    }

    public function store(Request $request){
        $tanggalLahir = Carbon::parse($request->tanggalLahir)->format('dmY');
        $nik = DB::table('users')->where('username','=',$request->nik)->get('username');
        if (!$nik->isEmpty()) {
            Alert::error('Gagal','No NIK sudah terdaftar!');
            return redirect()->back();
        } 
      $request->validate([
        'nama' => 'required',
        'nik' => 'required|unique:profiles|min:16',
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
        Alert::success('Berhasil!','data berhasil ditambahkan.');
        return redirect('/admin/warga');
    }
}
