<?php

namespace App\Http\Controllers\AdminDesa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
    $berita = DB::table('berita')->count();
    $penduduk = DB::table('users')->where('role','=','warga')->count();
    // dd($penduduk);
    return view('admin.contents.dashboard', compact('berita','penduduk'));
    }
}
