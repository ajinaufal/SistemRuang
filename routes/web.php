<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\peminjamanController;
use App\Http\Controllers\pengajuanController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\ruangController;
use App\Http\Livewire\Admin\CreatePeminjaman;
use App\Http\Livewire\Admin\UpdatePeminjaman;
use App\Http\Livewire\User\CreatePengajuan;

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

// Route::get('/', function () {
//     return view('layouts.index');
// });

Route::middleware(['auth:web'])->group(function () {
    Route::get('/', [berandaController::class, 'index'])->name('Beranda');

    // Ruang
    Route::get('/ruang', [ruangController::class, 'index'])->name('ruang');
    Route::get('/create-ruang', [ruangController::class, 'create']);
    Route::get('/cetak-ruang', [ruangController::class, 'cetakruang']);
    Route::get('/edit-ruang/{id}', [ruangController::class, 'edit']);
    Route::post('/update-ruang/{id}', [ruangController::class, 'update']);
    Route::get('/delete-ruang/{id}', [ruangController::class, 'destroy']);
    Route::post('/simpan-ruang', [ruangController::class, 'store']);

    // Barang
    Route::get('/barang', [barangController::class, 'index'])->name('barang');
    Route::get('/create-barang', [barangController::class, 'create']);
    Route::post('/simpan-barang', [barangController::class, 'store']);
    Route::get('/edit-barang/{id}', [barangController::class, 'edit']);
    Route::post('/update-barang/{id}', [barangController::class, 'update']);
    Route::get('/delete-barang/{id}', [barangController::class, 'destroy']);
    Route::get('/cetak-barang', [barangController::class, 'cetakbarang']);

    // Pengajuan
    Route::get('/formpeminjaman', CreatePengajuan::class)->name('formpeminjaman');
    // Route::get('/formpeminjaman', [pengajuanController::class, 'index'])->name('formpeminjaman');
    // Route::post('/formpeminjaman', [pengajuanController::class, 'index2'])->name('formpeminjaman');
    // Route::post('/simpanpeminjaman', [pengajuanController::class, 'pinjam'])->name('simpanpeminjaman');

    // Peminjaman 
    Route::get('/peminjaman', [peminjamanController::class, 'index'])->name('peminjaman');
    Route::get('/create-peminjaman', CreatePeminjaman::class )->name('create-peminjaman');
    // Route::post('/simpan-peminjaman', [peminjamanController::class, 'store'])->name('simpan-peminjaman');
    Route::get('/edit-peminjaman/{id}', UpdatePeminjaman::class)->name('edit-peminjaman');
    // Route::post('/edit-peminjaman/{id}', [peminjamanController::class, 'edit2'])->name('edit-peminjaman2');
    // Route::post('/update-peminjaman/{id}', [peminjamanController::class, 'update'])->name('update-peminjaman');
    Route::get('/delete-peminjaman/{id}', [peminjamanController::class, 'destroy'])->name('delete-peminjaman');
    Route::get('/cetak-peminjaman', [peminjamanController::class, 'cetakdata'])->name('cetak-peminjaman');

    Route::get('/setuju/{id}', [peminjamanController::class, 'agree']);
    Route::get('/tolak/{id}', [peminjamanController::class, 'reject']);

    // User
    Route::get('/pengguna', [penggunaController::class, 'index'])->name('pengguna');
    Route::get('/create-user', [penggunaController::class, 'create'])->name('create-user');
    Route::post('/simpan-user', [penggunaController::class, 'store'])->name('simpan-user');
    Route::get('/edit-user/{id}', [penggunaController::class, 'edit'])->name('edit-user');
    Route::post('/update-user/{id}', [penggunaController::class, 'update'])->name('update-user');
    Route::get('/delete-user/{id}', [penggunaController::class, 'destroy'])->name('delete-user');
    Route::get('/cetak-user', [penggunaController::class, 'cetakuser'])->name('cetak-user');
    Route::get('pengguna/status/{user_id}/{status_code}', [penggunaController::class, 'updateStatus'])->name('status-user');
});

Route::get('/login', [authController::class, 'indexLogin'])->name('login');
Route::post('/login', [authController::class, 'login']);

Route::get('/register', [authController::class, 'indexRegister'])->name('register');
Route::post('/register', [authController::class, 'register']);

Route::get('/logout', [authController::class, 'logout'])->name('Logout');
