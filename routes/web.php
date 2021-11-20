<?php

use App\Http\Controllers\mastercontrol;
use App\Http\Controllers\cetakcontrol;
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

// route view
// route::group(['middleware'=>['auth']],function(){
Route::get('/',[mastercontrol::class,'dashboard']);
Route::get('/guru',[mastercontrol::class,'guru']);
Route::get('/sekolah',[mastercontrol::class,'sekolah']);
Route::get('/kelurahan',[mastercontrol::class,'kelurahan']);
Route::get('/kecamatan',[mastercontrol::class,'kecamatan']);
Route::get('/pengguna',[mastercontrol::class,'pengguna']);
// route post
Route::post('/guru/upload',[mastercontrol::class,'gurupost']);
Route::post('/sekolah/upload',[mastercontrol::class,'sekolahpost']);
Route::post('/kelurahan/upload',[mastercontrol::class,'kelurahanpost']);
Route::post('/kecamatan/upload',[mastercontrol::class,'kecamatanpost']);
Route::post('/pengguna/upload',[mastercontrol::class,'penggunapost']);
// route untuk delete
Route::get('/guru/del/{id}',[mastercontrol::class,'delguru']);
Route::get('/sekolah/del/{id}',[mastercontrol::class,'delsekolah']);
Route::get('/kelurahan/del/{id}',[mastercontrol::class,'delkelurahan']);
Route::get('/kecamatan/del/{id}',[mastercontrol::class,'delkecamatan']);
Route::get('/pengguna/del/{id}',[mastercontrol::class,'delpengguna']);
// route untuk edit
Route::get('/guru/edit/{id}',[mastercontrol::class,'editguru']);
Route::get('/sekolah/edit/{id}',[mastercontrol::class,'editsekolah']);
Route::get('/kelurahan/edit/{id}',[mastercontrol::class,'editkelurahan']);
Route::get('/kecamatan/edit/{id}',[mastercontrol::class,'editkecamatan']);
Route::get('/pengguna/edit/{id}',[mastercontrol::class,'editpengguna']);
// route untuk post edit
Route::post('/guru/edit/{id}/post',[mastercontrol::class,'editgurupost']);
Route::post('/sekolah/edit/{id}/post',[mastercontrol::class,'editsekolahpost']);
Route::post('/kelurahan/edit/{id}/post',[mastercontrol::class,'editkelurahanpost']);
Route::post('/kecamatan/edit/{id}/post',[mastercontrol::class,'editkecamatanpost']);
Route::post('/pengguna/edit/{id}/post',[mastercontrol::class,'editpenggunapost']);
// });
Route::get('/login', [mastercontrol::class,'login'])->name('login');
Route::post('/loginpost', [mastercontrol::class,'loginpost'])->name('loginpost');
Route::get('/logout', [mastercontrol::class,'logout'])->name('logout');

Route::get('/cetakguru', [cetakcontrol::class,'cetakguru']);
Route::get('/cetakkecamatan', [cetakcontrol::class,'cetakkecamatan']);
