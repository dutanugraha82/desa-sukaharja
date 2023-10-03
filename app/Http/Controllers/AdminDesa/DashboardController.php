<?php

namespace App\Http\Controllers\AdminDesa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
    $berita = DB::table('berita')->count();
    $penduduk = DB::table('users')->where('role','=','warga')->count();
    $umkm = DB::table('umkm')->where('status_validasi','=', 1)->count();
    $saran = DB::table('saran')->count();

    $prestasi = DB::table('prestasi')->orderBy('created_at','desc')->get();
        if(request()->ajax()){
            return datatables()
            ->of($prestasi)
            ->addIndexColumn()
            ->addColumn('action', function($prestasi){
                return '<div class="d-flex justify-content-rounded">
                             <a href="/'.auth()->user()->role.'/prestasi/'.$prestasi->id.'" class="btn btn-warning mr-3" style="width:100px;">Edit</a>
                            <form action="/admin/prestasi/'.$prestasi->id.'" method="POST">
                            '.method_field("DELETE").'
                            '.csrf_field().'
                            <button type="submit" style="width:100px;" onclick="javascript: return confirm(\'Yakin Ingin Hapus Data?\')"  class="btn btn-danger">Hapus</button>
                            </form>
                        </div>';
            })
            ->addColumn('created_at', function($prestasi){
                return Carbon::parse($prestasi->created_at)->isoFormat('ddd, DD MMM Y');
            })
            ->rawColumns(['action', 'created_at'])
            ->make(true);
        }

    // dd($penduduk);
    return view('admin.contents.dashboard', compact('berita','penduduk','umkm','saran'));
    }
}
