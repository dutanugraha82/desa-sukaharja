<?php

use App\Http\Controllers\AdminDesa\AkunController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SensusController;
use App\Http\Controllers\AdminDesa\BeritaController;
use App\Http\Controllers\AdminDesa\ProfileController;
use App\Http\Controllers\AdminDesa\DashboardController;
use App\Http\Controllers\AdminDesa\KartuKeluargaController;
use App\Http\Controllers\AdminDesa\PerencanaanController;
use App\Http\Controllers\AdminDesa\UMKMController;
use App\Http\Controllers\LayananDesaController;
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
Route::get('/', [HomeController::class,'home'])->name('home');
// Route Superadmin Start
Route::middleware(['auth','superadmin','preventBack'])->name('superadmin.')->prefix('superadmin')->group(function (){

});
// Route Superadmin End

// Route Sekdes Start
Route::middleware(['auth','sekdes','preventBack'])->prefix('sekdes')->group(function(){
    Route::get('/',[ DashboardController::class,'index']);
    Route::get('/berita',[BeritaController::class,'index']);
    Route::get('/berita/json',[BeritaController::class,'json'])->name('sekdes.berita.json');
    Route::get('/berita/{id}',[BeritaController::class,'show']);
    Route::put('/berita/{id}/validasi',[BeritaController::class,'validasiBerita']);

});
// Route Sekdes End

// Route Admin Start
Route::middleware(['auth','admin','preventBack'])->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/kk', [KartuKeluargaController::class,'index']);
    Route::get('/kk/create', [KartuKeluargaController::class,'create']);
    Route::get('/kk/{id}/edit', [KartuKeluargaController::class,'edit']);
    Route::put('/kk/{id}', [KartuKeluargaController::class,'update']);
    Route::get('/profiles/create', [ProfileController::class,'create']);
    Route::post('/profiles', [ProfileController::class,'store']);
    Route::get('/profiles/{id}/edit', [ProfileController::class,'edit']);
    Route::put('/profiles/{id}',[ProfileController::class,'update']);
    Route::delete('/profiles/{id}',[ProfileController::class,'destroy']);
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
    Route::get('/sku-luar',[SuratController::class,'skuLuar'])->name('admin.sku-luar');
    Route::get('/sku-luar/{id}',[SuratController::class,'showSkuLuar']);
    Route::get('/sku-luar/{id}/edit',[SuratController::class,'editSkuLuar']);
    Route::put('/sku-luar/{id}',[SuratController::class,'updateSkuLuar']);
    Route::get('/sku-luar/{id}/print',[SuratController::class,'printSkuLuar']);
    Route::delete('/sku-luar/{id}',[SuratController::class,'destroySkuLuar']);
    Route::get('/berita/json',[BeritaController::class,'json'])->name('berita.json');
    Route::resource('berita',BeritaController::class);
    Route::get('/umkm', [UMKMController::class,'index']);
    Route::get('/umkm/create',[UMKMController::class,'create']);
    Route::get('/umkm/json-validasi-umkm',[UMKMController::class,'jsonValidasiUMKM'])->name('validasiUMKM.json');
    Route::get('/umkm/json',[UMKMController::class,'json'])->name('umkm.json');
    Route::get('/umkm/{id}/edit',[UMKMController::class,'edit']);
    Route::get('/umkm/{id}',[UMKMController::class,'show']);
    Route::put('/umkm/{id}/validasi',[UMKMController::class,'validasiUMKM']);
    Route::delete('/umkm/{id}',[UMKMController::class,'destroy']);
    Route::get('/akun',[AkunController::class,'edit']);
    Route::put('/akun/{id}',[AkunController::class,'update']);
    Route::get('/rpjm',[PerencanaanController::class,'rpjm'])->name('admin.rpjm');
    Route::post('/rpjm',[PerencanaanController::class,'rpjmStore']);
    Route::get('/rpjm/{id}/edit',[PerencanaanController::class,'rpjmEdit']);
    Route::put('/rpjm/{id}',[PerencanaanController::class,'rpjmUpdate']);
    Route::delete('/rpjm/{id}',[PerencanaanController::class,'rpjmDestroy']);
    Route::get('/rkp',[PerencanaanController::class,'rkp'])->name('admin.rkp');
    Route::post('/rkp',[PerencanaanController::class,'rkpStore']);
    Route::get('/rkp/{id}/edit',[PerencanaanController::class,'rkpEdit']);
    Route::put('/rkp/{id}',[PerencanaanController::class,'rkpUpdate']);
    Route::delete('/rkp/{id}',[PerencanaanController::class,'rkpDestroy']);
    Route::get('/perdes',[PerencanaanController::class,'perdes'])->name('admin.perdes');
    Route::post('/perdes',[PerencanaanController::class,'perdesStore']);
    Route::get('/perdes/{id}/edit',[PerencanaanController::class,'perdesEdit']);
    Route::put('/perdes/{id}',[PerencanaanController::class,'perdesUpdate']);
    Route::delete('/perdes/{id}',[PerencanaanController::class,'perdesDestroy']);
    Route::get('/perkades',[PerencanaanController::class,'perkades'])->name('admin.perkades');
    Route::post('/perkades',[PerencanaanController::class,'perkadesStore']);
    Route::get('/perkades/{id}/edit',[PerencanaanController::class,'perkadesEdit']);
    Route::put('/perkades/{id}',[PerencanaanController::class,'perkadesUpdate']);
    Route::delete('/perkades/{id}',[PerencanaanController::class,'perkadesDestroy']);
    Route::get('/transparansi',[PerencanaanController::class,'transparansi'])->name('admin.transparansi');
    Route::post('/transparansi',[PerencanaanController::class,'transparansiStore']);
    Route::get('/transparansi/{id}/edit',[PerencanaanController::class,'transparansiEdit']);
    Route::put('/transparansi/{id}',[PerencanaanController::class,'transparansiUpdate']);
    Route::delete('/transparansi/{id}',[PerencanaanController::class,'transparansiDestroy']);
    Route::get('/saran',[LayananDesaController::class,'adminSaran'])->name('admin.saran');
    Route::get('/saran/{id}',[LayananDesaController::class,'adminSaranShow']);
    Route::get('/prestasi/create',[LayananDesaController::class,'prestasiCreate']);
    Route::post('/prestasi',[LayananDesaController::class,'prestasiStore']);
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

// Route UMKM
Route::middleware(['auth','preventBack'])->group(function(){
    Route::get('/pengajuan-umkm',[LayananDesaController::class,'pengajuanUMKM']);
    Route::post('/filepond',[LayananDesaController::class,'filePond']);
    Route::delete('/revert',[LayananDesaController::class,'deleteFilePond']);
    Route::post('/pengajuan-umkm',[LayananDesaController::class,'storePengajuanUMKM']);
});
// Route UMKM END

Route::get('/layanan-desa', [LayananDesaController::class,'index']);
Route::get('/berita/{slug}', [HomeController::class,'berita']);
Route::get('/data-penduduk', [LayananDesaController::class,'dataPenduduk'])->name('data-penduduk');
Route::get('/umkm-masyarakat', [LayananDesaController::class,'umkm']);
Route::get('/umkm-masyarakat/{id}', [LayananDesaController::class,'detailUMKM']);
Route::get('/sku-luar',[SuratController::class,'createSkuLuar']);
Route::post('/sku-luar',[SuratController::class,'storeSkuLuar']);

Route::get('/statistik', [StatistikController::class,'index']);

Route::get('/wilayah', function(){
    return view('UserPages.layout.wilayah');
});
Route::get('/prestasi',[LayananDesaController::class,'prestasi']);
Route::get('/perencanaan', [PerencanaanController::class,'user']);
Route::get('/saran', [LayananDesaController::class,'saran']);
Route::post('/saran',[LayananDesaController::class,'saranStore']);
Route::get('/transparansi', function(){
    $data = DB::table('transparansi')->get();
    return view('UserPages.layout.transparansi', compact('data'));
});

Route::get('/lembaga', function(){
    return view('UserPages.layout.lembaga');
});


