<?php

namespace App\Http\Controllers\AdminDesa;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PerencanaanController extends Controller
{
    public function user(){
        $rpjm = DB::table('rpjm')->get();
        $rkp = DB::table('rkp')->get();
        $perdes = DB::table('perdes')->get();
        $perkades = DB::table('perkades')->get();
        return view('UserPages.layout.perencanaan', compact('rpjm','rkp','perdes','perkades'));
    }

    public function rpjm(Request $request){
        // dd($request);
        if ($request->ajax()) {
            $rpjm = DB::table('rpjm')->get();
            return datatables()->of($rpjm)
            ->addIndexColumn()
            ->addColumn('action', function($rpjm){
               return '<div class="d-flex">
                        <a href="/admin/rpjm/'.$rpjm->id.'/edit" class="btn btn-warning mr-2" style="width:150px">Edit</a>
                        <form action="/admin/rpjm/'.$rpjm->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <input type="hidden" name="file" value="'.$rpjm->file.'">
                            <button class="btn btn-danger" style="width:150px" type="submit" onclick="javascript: return confirm(\'Hapus '.$rpjm->nama.' ?\')">Hapus</button>
                        </form>
                        </div>';
            })
            ->addColumn('file', function($rpjm){
                return '<a href="'.asset('/storage'.'/'.$rpjm->file).'" target="_blank" rel="noopener noreferrer">file</a>';
            })
            ->rawColumns(['action','file'])
            ->make(true);
        }

        return view('admin.contents.rpjm.index');
    }

    public function rpjmStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);

        DB::table('rpjm')->insert([
            'nama' => Str::upper($request->nama),
            'file' => $request->file('file')->store('rpjm'),
        ]);

        Alert::success('RPJM Ditambahkan!');

        return redirect('/admin/rpjm');
    }

    public function rpjmEdit($id){
        $data = DB::table('rpjm')->where('id',$id)->get();
        return view('admin.contents.rpjm.edit', compact('data'));

    }

    public function rpjmUpdate(Request $request, $id){
        $request->validate([
            'nama' => 'required',
        ]);

        if ($request->newFile) {
            DB::table('rpjm')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
                'file' => $request->file('newFile')->store('rpjm')
            ]);

            Storage::delete($request->oldFile);
            Alert::success('Update data berhasil');
            return redirect('/admin/rpjm');
        }else{
            DB::table('rpjm')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
            ]);
            Alert::success('Update data berhasil');
             return redirect('/admin/rpjm');
        }
    }

    public function rpjmDestroy(Request $request, $id){
        DB::table('rpjm')->where('id',$id)->delete();
        Storage::delete($request->file);
        Alert::success('Data berhasil terhapus!');
        return redirect('/admin/rpjm');
    }

    public function rkp(Request $request){
        // dd($request);
        if ($request->ajax()) {
            $rkp = DB::table('rkp')->get();
            return datatables()->of($rkp)
            ->addIndexColumn()
            ->addColumn('action', function($rkp){
               return '<div class="d-flex">
                        <a href="/admin/rkp/'.$rkp->id.'/edit" class="btn btn-warning mr-2" style="width:150px">Edit</a>
                        <form action="/admin/rkp/'.$rkp->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <input type="hidden" name="file" value="'.$rkp->file.'">
                            <button class="btn btn-danger" style="width:150px" type="submit" onclick="javascript: return confirm(\'Hapus '.$rkp->nama.' ?\')">Hapus</button>
                        </form>
                        </div>';
            })
            ->addColumn('file', function($rkp){
                return '<a href="'.asset('/storage'.'/'.$rkp->file).'" target="_blank" rel="noopener noreferrer">file</a>';
            })
            ->rawColumns(['action','file'])
            ->make(true);
        }

        return view('admin.contents.rkp.index');
    }

    public function rkpStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);

        DB::table('rkp')->insert([
            'nama' => Str::upper($request->nama),
            'file' => $request->file('file')->store('rkp'),
        ]);

        Alert::success('RKP Ditambahkan!');

        return redirect('/admin/rkp');
    }

    public function rkpEdit($id){
        $data = DB::table('rkp')->where('id',$id)->get();
        return view('admin.contents.rkp.edit', compact('data'));

    }

    public function rkpUpdate(Request $request, $id){
        $request->validate([
            'nama' => 'required',
        ]);

        if ($request->newFile) {
            DB::table('rkp')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
                'file' => $request->file('newFile')->store('rkp')
            ]);

            Storage::delete($request->oldFile);
            Alert::success('Update data berhasil');
            return redirect('/admin/rkp');
        }else{
            DB::table('rkp')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
            ]);
            Alert::success('Update data berhasil');
             return redirect('/admin/rkp');
        }
    }

    public function rkpDestroy(Request $request, $id){
        DB::table('rkp')->where('id',$id)->delete();
        Storage::delete($request->file);
        Alert::success('Data berhasil terhapus!');
        return redirect('/admin/rkp');
    }

    public function perdes(Request $request){
        // dd($request);
        if ($request->ajax()) {
            $perdes = DB::table('perdes')->get();
            return datatables()->of($perdes)
            ->addIndexColumn()
            ->addColumn('action', function($perdes){
               return '<div class="d-flex">
                        <a href="/admin/perdes/'.$perdes->id.'/edit" class="btn btn-warning mr-2" style="width:150px">Edit</a>
                        <form action="/admin/perdes/'.$perdes->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <input type="hidden" name="file" value="'.$perdes->file.'">
                            <button class="btn btn-danger" style="width:150px" type="submit" onclick="javascript: return confirm(\'Hapus '.$perdes->nama.' ?\')">Hapus</button>
                        </form>
                        </div>';
            })
            ->addColumn('file', function($perdes){
                return '<a href="'.asset('/storage'.'/'.$perdes->file).'" target="_blank" rel="noopener noreferrer">file</a>';
            })
            ->rawColumns(['action','file'])
            ->make(true);
        }

        return view('admin.contents.perdes.index');
    }

    public function perdesStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);

        DB::table('perdes')->insert([
            'nama' => Str::upper($request->nama),
            'file' => $request->file('file')->store('perdes'),
        ]);

        Alert::success('PERDES Ditambahkan!');

        return redirect('/admin/perdes');
    }

    public function perdesEdit($id){
        $data = DB::table('perdes')->where('id',$id)->get();
        return view('admin.contents.perdes.edit', compact('data'));

    }

    public function perdesUpdate(Request $request, $id){
        $request->validate([
            'nama' => 'required',
        ]);

        if ($request->newFile) {
            DB::table('perdes')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
                'file' => $request->file('newFile')->store('perdes')
            ]);

            Storage::delete($request->oldFile);
            Alert::success('Update data berhasil');
            return redirect('/admin/perdes');
        }else{
            DB::table('perdes')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
            ]);
            Alert::success('Update data berhasil');
             return redirect('/admin/perdes');
        }
    }

    public function perdesDestroy(Request $request, $id){
        DB::table('perdes')->where('id',$id)->delete();
        Storage::delete($request->file);
        Alert::success('Data berhasil terhapus!');
        return redirect('/admin/perdes');
    }

    public function perkades(Request $request){
        // dd($request);
        if ($request->ajax()) {
            $perkades = DB::table('perkades')->get();
            return datatables()->of($perkades)
            ->addIndexColumn()
            ->addColumn('action', function($perkades){
               return '<div class="d-flex">
                        <a href="/admin/perkades/'.$perkades->id.'/edit" class="btn btn-warning mr-2" style="width:150px">Edit</a>
                        <form action="/admin/perkades/'.$perkades->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <input type="hidden" name="file" value="'.$perkades->file.'">
                            <button class="btn btn-danger" style="width:150px" type="submit" onclick="javascript: return confirm(\'Hapus '.$perkades->nama.' ?\')">Hapus</button>
                        </form>
                        </div>';
            })
            ->addColumn('file', function($perkades){
                return '<a href="'.asset('/storage'.'/'.$perkades->file).'" target="_blank" rel="noopener noreferrer">file</a>';
            })
            ->rawColumns(['action','file'])
            ->make(true);
        }

        return view('admin.contents.perkades.index');
    }

    public function perkadesStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);

        DB::table('perkades')->insert([
            'nama' => Str::upper($request->nama),
            'file' => $request->file('file')->store('perkades'),
        ]);

        Alert::success('PERDES Ditambahkan!');

        return redirect('/admin/perkades');
    }

    public function perkadesEdit($id){
        $data = DB::table('perkades')->where('id',$id)->get();
        return view('admin.contents.perkades.edit', compact('data'));

    }

    public function perkadesUpdate(Request $request, $id){
        $request->validate([
            'nama' => 'required',
        ]);

        if ($request->newFile) {
            DB::table('perkades')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
                'file' => $request->file('newFile')->store('perkades')
            ]);

            Storage::delete($request->oldFile);
            Alert::success('Update data berhasil');
            return redirect('/admin/perkades');
        }else{
            DB::table('perkades')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
            ]);
            Alert::success('Update data berhasil');
             return redirect('/admin/perkades');
        }
    }

    public function perkadesDestroy(Request $request, $id){
        DB::table('perkades')->where('id',$id)->delete();
        Storage::delete($request->file);
        Alert::success('Data berhasil terhapus!');
        return redirect('/admin/perkades');
    }

    public function transparansi(Request $request){
        // dd($request);
        if ($request->ajax()) {
            $transparansi = DB::table('transparansi')->get();
            return datatables()->of($transparansi)
            ->addIndexColumn()
            ->addColumn('action', function($transparansi){
               return '<div class="d-flex">
                        <a href="/admin/transparansi/'.$transparansi->id.'/edit" class="btn btn-warning mr-2" style="width:150px">Edit</a>
                        <form action="/admin/transparansi/'.$transparansi->id.'" method="POST">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <input type="hidden" name="file" value="'.$transparansi->file.'">
                            <button class="btn btn-danger" style="width:150px" type="submit" onclick="javascript: return confirm(\'Hapus '.$transparansi->nama.' ?\')">Hapus</button>
                        </form>
                        </div>';
            })
            ->addColumn('file', function($transparansi){
                return '<a href="'.asset('/storage'.'/'.$transparansi->file).'" target="_blank" rel="noopener noreferrer">file</a>';
            })
            ->rawColumns(['action','file'])
            ->make(true);
        }

        return view('admin.contents.transparansi.index');
    }
    
    
    public function transparansiStore(Request $request){
        $request->validate([
            'nama' => 'required',
            'file' => 'required',
        ]);

        DB::table('transparansi')->insert([
            'nama' => Str::upper($request->nama),
            'file' => $request->file('file')->store('transparansi'),
        ]);

        Alert::success('TRANSPARANSI Ditambahkan!');

        return redirect('/admin/transparansi');
    }

    public function transparansiEdit($id){
        $data = DB::table('transparansi')->where('id',$id)->get();
        return view('admin.contents.transparansi.edit', compact('data'));

    }

    public function transparansiUpdate(Request $request, $id){
        $request->validate([
            'nama' => 'required',
        ]);

        if ($request->newFile) {
            DB::table('transparansi')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
                'file' => $request->file('newFile')->store('transparansi')
            ]);

            Storage::delete($request->oldFile);
            Alert::success('Update data berhasil');
            return redirect('/admin/transparansi');
        }else{
            DB::table('transparansi')->where('id',$id)->update([
                'nama' => Str::upper($request->nama),
            ]);
            Alert::success('Update data berhasil');
             return redirect('/admin/transparansi');
        }
    }

    public function transparansiDestroy(Request $request, $id){
        DB::table('transparansi')->where('id',$id)->delete();
        Storage::delete($request->file);
        Alert::success('Data berhasil terhapus!');
        return redirect('/admin/transparansi');
    }


}
