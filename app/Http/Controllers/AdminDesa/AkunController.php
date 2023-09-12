<?php

namespace App\Http\Controllers\AdminDesa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AkunController extends Controller
{
    public function edit(){
        $akun = User::find(auth()->user()->id);
        return view('admin.contents.akun.edit', compact('akun'));
    }

    public function update(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        User::find(auth()->user()->id)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Alert::success('Sunting Akun Berhasil!');
        return redirect('/'.auth()->user()->role);
    }
}
