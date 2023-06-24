<?php

use App\Http\Controllers\AdminDesa\BeritaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminDesa\ProfileController;
use App\Http\Controllers\AdminDesa\DashboardController;
use App\Http\Controllers\AdminDesa\KartuKeluargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->middleware('guest');
Route::post('/logout',[LoginController::class,'logout'])->middleware('auth');
Route::get('/', [HomeController::class,'home']);
// Route Superadmin Start
Route::middleware(['auth','superadmin','preventBack'])->name('superadmin.')->prefix('superadmin')->group(function (){

});
// Route Superadmin End

// Route Admin Start
Route::middleware(['auth','admin','preventBack'])->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class,'index']);
    Route::get('/kk', [KartuKeluargaController::class,'index']);
    Route::get('/kk/create', [KartuKeluargaController::class,'create']);
    Route::get('/profiles/create', [ProfileController::class,'create']);
    Route::post('/profiles', [ProfileController::class,'store']);
    Route::post('/kk',[KartuKeluargaController::class,'store']);
    Route::get('/ktm/{id}',[SuratController::class,'showKTM']);
    Route::get('/berita/json',[BeritaController::class,'json'])->name('berita.json');
    Route::resource('berita',BeritaController::class);
});
// Route Admin End

// Route Warga Start
Route::middleware(['auth','warga','preventBack'])->group(function(){
    Route::get('/ktm',[SuratController::class,'createKTM']);
    Route::post('/ktm',[SuratController::class,'storeKTM']);
});
// Route Warga End

Route::get('/layanan-desa', function () {
    return view('UserPages.layout.layanan-desa');
});

Route::get('/statistik', function(){
    return view('UserPages.layout.statistik');
});

Route::get('/wilayah', function(){
    return view('UserPages.layout.wilayah');
});

Route::get('/perencanaan', function(){
    return view('UserPages.layout.perencanaan');
});

Route::get('/transparansi', function(){
    return view('UserPages.layout.transparansi');
});

Route::get('/lembaga', function(){
    return view('UserPages.layout.lembaga');
});

Route::get('/umkm-masyarakat', function(){
    return view('UserPages.layout.umkm-masyarakat');
});

Route::get('/umkm-masyarakat/id', function(){
    return view('UserPages.layout.umkm-masyarakat-detail');
});


