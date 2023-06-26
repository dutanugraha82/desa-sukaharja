<?php

namespace App\Http\Controllers\AdminDesa;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KartuKeluargaController extends Controller
{
    public function index(){
        return view('admin.contents.kk.index');
    }

    public function json(){
        $kk = KartuKeluarga::select('*')->orderBy('created_at','desc')->get();
        return datatables()->of($kk)
        ->addIndexColumn()
        ->addColumn('action', function($kk){
            return ' <div class="d-flex">   
                    <a href="/admin/kk/'.$kk->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    
                    </div>';
        })
        ->addColumn('alamat', function($kk){
            return Crypt::decrypt($kk['alamat']);
        })
        ->addColumn('no_kk', function($kk){
            return Crypt::decrypt($kk['no_kk']);
        })
        ->rawColumns(['action','alamat','no_kk'])
        ->make(true);
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
