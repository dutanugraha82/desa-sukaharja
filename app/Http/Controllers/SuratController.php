<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function createKTM(){
        return view('UserPages.layout.ktm');
    }
}
