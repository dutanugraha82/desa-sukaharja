<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\SensusController;
use App\Http\Controllers\AdminDesa\BeritaController;
use App\Http\Controllers\AdminDesa\ProfileController;
use App\Http\Controllers\AdminDesa\DashboardController;
use App\Http\Controllers\AdminDesa\KartuKeluargaController;
use App\Http\Controllers\StatistikController;

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
    Route::get('/kk/{id}/edit', [KartuKeluargaController::class,'edit']);
    Route::put('/kk/{id}', [KartuKeluargaController::class,'update']);
    Route::get('/profiles/create', [ProfileController::class,'create']);
    Route::post('/profiles', [ProfileController::class,'store']);
    Route::get('/profiles/{id}/edit', [ProfileController::class,'edit']);
    Route::put('/profiles/{id}',[ProfileController::class,'update']);
    Route::get('/profiles',[ProfileController::class,'index']);
    Route::get('/profiles/json',[ProfileController::class,'json'])->name('warga.json');
    Route::get('/kk/json',[KartuKeluargaController::class,'json'])->name('kk.json');
    Route::post('/kk',[KartuKeluargaController::class,'store']);
    Route::get('/ktm',[SuratController::class,'ktm']);
    Route::get('/ktm/json',[SuratController::class,'jsonKTM'])->name('ktm.json');
    Route::get('/ktm/{id}',[SuratController::class,'showKTM']);
    Route::get('/sku-dalam',[SuratController::class,'skuDalam']);
    Route::get('/sku-dalam/json',[SuratController::class,'skuDalamJson'])->name('sku-dalam.json');
    Route::get('/sku-dalam/{id}',[SuratController::class,'showSKU']);
    Route::get('/berita/json',[BeritaController::class,'json'])->name('berita.json');

    Route::resource('berita',BeritaController::class);
});
// Route Admin End


// Route Sensus Start
    Route::middleware(['auth','petugas-sensus','preventBack'])->group(function(){
        Route::get('/sensus', function(){
            return view('sensus');
        });
        Route::get('/sensus-kk',[SensusController::class,'createKK']);
        Route::post('/sensus-kk',[SensusController::class,'storeKK']);
        Route::get('/sensus-penduduk',[SensusController::class,'createPenduduk']);
        Route::post('/sensus-penduduk',[SensusController::class,'storePenduduk']);

    });
// Route Sensus End
// Route Warga Start
Route::middleware(['auth','warga','preventBack'])->group(function(){
    Route::get('/ktm',[SuratController::class,'createKTM']);
    Route::post('/ktm',[SuratController::class,'storeKTM']);
    Route::get('/sku-dalam',[SuratController::class,'createSKU']);
    Route::post('/sku-dalam',[SuratController::class,'storeSKU']);
});
// Route Warga End

Route::get('/layanan-desa', function () {
    return view('UserPages.layout.layanan-desa');
});

Route::get('/data-penduduk', function (){
    $data = DB::table('profiles')->orderBy('created_at','desc')->get();
    if(request()->ajax()){
        return datatables()
        ->of($data)
        ->addIndexColumn()
        ->make(true);
    }
    return view('UserPages.layout.data-penduduk');
})->name('data-penduduk');

Route::get('/statistik', [StatistikController::class,'index']);

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


