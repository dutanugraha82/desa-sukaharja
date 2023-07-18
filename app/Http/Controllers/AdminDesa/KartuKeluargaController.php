<?php

namespace App\Http\Controllers\AdminDesa;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class KartuKeluargaController extends Controller
{
    public function index(){
        return view('admin.contents.kk.index');
    }

    public function json(){
        $kk = KartuKeluarga::select('*')->orderBy('updated_at','desc')->get();
        // $no_kk = [];
        // $alamat = [];
        // foreach ($kk as $item) {
        //     $no_kk[] = Crypt::decrypt($item->no_kk);
        //     $alamat[] = Crypt::decrypt($item->alamat);
        // }

        // dd($no_kk);
        return datatables()->of($kk)
        ->addIndexColumn()
        ->addColumn('action', function($kk){
            return ' <div class="d-flex">   
                    <a href="/admin/kk/'.$kk->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                    
                    </div>';
        })
        ->addColumn('no_kk', function($kk){
            return Crypt::decrypt($kk['no_kk']) ;
        })
        ->addColumn('alamat', function($kk){
            return Crypt::decrypt($kk['alamat']);
        })
        
        ->rawColumns(['action','no_kk','alamat'])
        ->make(true);
    }

    public function create(){
        return view('admin.contents.kk.create');
    }

    public function store(Request $request){
        $dataKK = DB::table('kk')->where('kk','=',$request->no_kk)->get('kk');
        if (!$dataKK->isEmpty()) {
            Alert::error('Gagal!','No KK Sudah Ada');
            return redirect()->back();
        }

        DB::table('kk')->insert([
            'kk' => $request->no_kk,
        ]);

       $request->validate([
                    'no_kk' => 'required|unique:kartu_keluarga|min:16',
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
                    Alert::success('Berhasil!','data berhasil ditambahkan.');
                    return redirect('/admin/kk');
                }

        public function edit($id){
          $data =  KartuKeluarga::find($id);
            return view('admin.contents.kk.edit', compact('data'));
        }

        public function update(Request $request, $id){

            // dd($request);
            $request->validate([
                'kepalaKeluarga' => 'required',
                'no_kk' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'pos' => 'required',
                'provinsi' => 'required',
                'desa' => 'required',
            ]);
            KartuKeluarga::find($id)->update([
                'nama_kepala_keluarga' => $request->kepalaKeluarga,
                'no_kk' => Crypt::encrypt($request->no_kk),
                'alamat' => Crypt::encrypt($request->alamat),
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kabupaten' => $request->kabupaten,
                'pos' => $request->pos,
                'provinsi' => $request->provinsi,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
            ]);

            Alert::success('Berhasil!','data berhasil dirubah!');
            return redirect('/admin/kk');
        }
    }
