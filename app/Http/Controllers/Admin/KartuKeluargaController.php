<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KartuKeluargaController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('admin.contents.kk.create');
    }

    public function store(Request $request){
        // dd($request);
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

                    return redirect('/admin/profiles/create');
                }
    }
