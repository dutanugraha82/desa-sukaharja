<?php

namespace App\Http\Controllers\AdminDesa;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contents.berita.index');
    }

    public function json(){

        if (auth()->user()->role == 'sekdes') {
            $berita = Berita::select('*')->orderBy('created_at','desc')->where('status_validasi',0)->get();
            return datatables()->of($berita)
            ->addIndexColumn()
            ->addColumn('action', function($berita){
                return ' <div class="d-flex">   
                        <a href="/sekdes/berita/'.$berita->id.'" class="btn  mx-3 btn-primary">Preview</a>
                        <form action="/sekdes/berita/'.$berita->id.'/validasi" method="POST">
                            '.csrf_field().'
                            '.method_field("PUT").'
                            <button class="btn  btn-success" onclick="javascript: return confirm(\'Validasi '.$berita->judul.' ?\')">Validasi</button>
                        </form>
                        </div>';
            })->addColumn('created_at', function($berita){
                return Carbon::parse($berita['created_at'])->isoFormat('dddd, D MMMM Y');
            })
            ->rawColumns(['action','created_at'])
            ->make(true);
        }
        elseif(auth()->user()->role == 'admin'){
            $berita = Berita::select('*')->orderBy('created_at','desc')->get();
            return datatables()->of($berita)
            ->addIndexColumn()
            ->addColumn('action', function($berita){
                return ' <div class="d-flex">   
                        <a href="/admin/berita/'.$berita->id.'/edit" class="btn  btn-warning" style="width:80px;">Edit</a>
                        <a href="/admin/berita/'.$berita->id.'" class="btn  mx-3 btn-primary">Preview</a>
                        <form action="/admin/berita/'.$berita->id.'" method="POST">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                            <input type="hidden" name="gambar" value="'.$berita->gambar.'">
                            <button class="btn  btn-danger" onclick="javascript: return confirm(\'Hapus '.$berita->judul.' ?\')">Delete</button>
                        </form>
                        </div>';
            })
            ->addColumn('status_validasi', function($berita){
                if ($berita->status_validasi == 0) {
                    return 'Belum Divalidasi';
                }elseif ($berita->status_validasi == 1) {
                    return 'Sudah Divalidasi';
                }else{
                    return 'Validasi Error';
                }
            })
            ->addColumn('created_at', function($berita){
                return Carbon::parse($berita['created_at'])->isoFormat('dddd, D MMMM Y');
            })
            ->rawColumns(['action','created_at','status_validasi'])
            ->make(true);
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image',
            'deskripsi' => 'required',
        ]);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul,'-'),
            'gambar' => $request->file('gambar')->store('berita'),
            'deskripsi' => $request->deskripsi,
            'status_validasi' => 0,
        ]);

        return redirect('/admin/berita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $berita = Berita::find($id);
        return view('admin.contents.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Berita::find($id);
        return view('admin.contents.berita.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        if ($request->gambar) {

            Berita::find($id)->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul,'-'),
                'gambar' => $request->file('gambar')->store('berita'),
                'deskripsi' => $request->deskripsi,
            ]);

            Storage::delete($request->oldGambar);
            return redirect('/admin/berita');

        } else {

           Berita::find($id)->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul,'-'),
            'deskripsi' => $request->deskripsi,
           ]);

           return redirect('/admin/berita');
        }
        
    }

    public function validasiBerita($id){

        DB::table('berita')->where('id',$id)->update([
            'status_validasi' => 1,
            'updated_at' => Carbon::now(),
        ]);

        Alert::success('Validasi Berhasil!');
        return redirect('/sekdes/berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Storage::delete($request->gambar);
        Berita::find($id)->delete();

        return redirect('/admin/berita');
    }
}
