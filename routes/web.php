<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('UserPages.layout.dashboard');
});

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