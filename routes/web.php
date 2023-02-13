<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitKontroller;
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
    return view('welcome');
});

Route::get('admin/buku', [BukuController::class, 'index'])->name('data.buku');
Route::post('admin/buku/add', [BukuController::class, 'store'])->name('tambah.buku');
Route::put('admin/buku/update/{id}', [BukuController::class, 'update'])->name('edit.buku');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('admin/profil', [AdminController::class, 'profil'])->name('profil');

Route::get('admin/kategori', [KategoriController::class, 'index'])->name('data.kategori');
Route::post('admin/kategori/add', [KategoriController::class, 'store'])->name('tambah.kategori');
Route::put('admin/kategori/update/{id}', [KategoriController::class, 'update'])->name('edit.kategori');

Route::get('admin/penerbit', [PenerbitKontroller::class, 'index'])->name('data.penerbit');
Route::post('admin/penerbit/add', [PenerbitKontroller::class, 'store'])->name('tambah.penerbit');
Route::put('admin/penerbit/update/{id}', [PenerbitKontroller::class, 'update'])->name('edit.penerbit');
