<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request)
    {
        
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // dd($credentials);
 
        if (Auth::attempt($credentials)) {
           if (auth()->user()->role == 'superadmin') {
                return redirect('/superadmin');

           }elseif (auth()->user()->role == 'admin') {
                return redirect('/admin');

           }elseif (auth()->user()->role == 'pelayanan') {
                return redirect('/pelayanan');

           }elseif (auth()->user()->role == 'kades') {
                return redirect('/kades');

           }elseif (auth()->user()->role == 'sekdes') {
                return redirect('/sekdes');
                
           }elseif (auth()->user()->role == 'warga') {
                return redirect('/warga');
           }
           
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request){
     Auth::logout();
 
     $request->session()->invalidate();
  
     $request->session()->regenerateToken();
     
     return redirect('/');
    }
}
