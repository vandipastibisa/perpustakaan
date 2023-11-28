<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;




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
    return view('auth.login');
});

Route::get('/login' , [AuthController::class, 'login'])->name('login');
Route::post('/postlogin' , [AuthController::class, 'postlogin']);
Route::get('/logout' , [AuthController::class, 'logout']);


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard' , [DashboardController::class, 'index']);

    
 Route::get('/kategori', [KategoriController::class, 'index']);
 Route::Post('/kategori/store', [KategoriController::class, 'store']);
 Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
 Route::Put('/kategori/{id}', [KategoriController::class, 'update']);
 Route::get('/kategori/{id}', [KategoriController::class, 'destroy']);


});

//penerbit
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::Post('/penerbit/store', [PenerbitController::class, 'store']);
Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit']);
Route::Put('/penerbit/{id}', [PenerbitController::class, 'update']);
Route::get('/penerbit/{id}', [PenerbitController::class, 'destroy']);


Route::resource('/anggota',AnggotaController::class);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit']);
Route::put('/anggota/{id}', [AnggotaController::class, 'update']);
Route::get('/anggota/{id}', [AnggotaController::class, 'destroy']);

Route::resource('/buku', BukuController::class);
Route::post('/buku/store', [BukuController::class, 'store']);
Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
Route::put('/buku/{id}', [BukuController::class, 'update']);
Route::get('/buku/{id}', [BukuController::class, 'destroy']);

