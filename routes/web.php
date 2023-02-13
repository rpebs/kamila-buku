<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitKontroller;
use App\Models\PenerbitModel;
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
    return view('admin.login');
});
Route::get('login', [AdminController::class, 'index'])->name('login');
Route::post('/login', [AdminController::class, 'login_action'])->name('act.login');
Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/buku', [BukuController::class, 'index'])->name('data.buku');
    Route::post('admin/buku/add', [BukuController::class, 'store'])->name('tambah.buku');
    Route::post('admin/buku/update', [BukuController::class, 'edit'])->name('edit.buku');
    Route::get('/admin/buku/delete/{id}', [BukuController::class, 'delete'])->name('hapus.buku');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('admin/profil', [AdminController::class, 'profil'])->name('profil');

    Route::get('admin/kategori', [KategoriController::class, 'index'])->name('data.kategori');
    Route::post('admin/kategori/add', [KategoriController::class, 'store'])->name('tambah.kategori');
    Route::post('admin/kategori/update', [KategoriController::class, 'edit'])->name('edit.kategori');
    Route::get('/admin/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('hapus.kategori');

    Route::get('admin/penerbit', [PenerbitKontroller::class, 'index'])->name('data.penerbit');
    Route::post('admin/penerbit/add', [PenerbitKontroller::class, 'store'])->name('tambah.penerbit');
    Route::post('admin/penerbit/update', [PenerbitKontroller::class, 'edit'])->name('edit.penerbit');
    Route::get('/admin/penerbit/delete/{id}', [PenerbitKontroller::class, 'delete'])->name('hapus.penerbit');
});
