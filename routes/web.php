<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesananController;
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
    return view('cover');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/profil',ProfileController::class)->middleware('auth');
Route::post('/update-foto-profile/{id}',[ProfileController::class,'updateFotoProfile'])->middleware('auth');
Route::post('/pesanan/{id}',[PesananController::class,'tambahRincianPesanan'])->middleware('auth');
Route::post('/delete-rincian-pesanan/{id}',[PesananController::class,'deleteRincianPesanan'])->middleware('auth');
Route::resource('/pesanan',PesananController::class)->middleware('auth');
Route::resource('/barang',BarangController::class)->middleware('auth');
Route::resource('/jenis-barang',JenisBarangController::class);
Route::resource('/satuan',SatuanController::class);
// Route::resource('/supplier',SupplierController::class);
