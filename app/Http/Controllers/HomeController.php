<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $berita = DB::table('berita')->orderBy('created_at','desc')->limit(9)->get();
        return view('UserPages.layout.dashboard', compact('berita'));
    }

    public function berita($slug){
        $berita = DB::table('berita')->where('slug',$slug)->get();
        $slug = $berita[0]->slug;
        return view('UserPages.layout.berita', compact('berita','slug'));
    }
}
