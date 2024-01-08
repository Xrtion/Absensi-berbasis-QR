<?php

use App\Http\Controllers\AbensiController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaGuruController;
use App\Http\Controllers\BerandaOperatorController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GurukelasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswakelasController;
use App\Http\Controllers\TamsiswaController;
use App\Http\Controllers\UserController;
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

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');
    Route::resource('user', UserController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('ruang', RuangController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('peserta', PesertaController::class);
    Route::get('/pertemuan/hapus/{id}', 'PertemuanController@hapus');
    Route::get('/peserta/hapus/{id}', 'PesertaController@hapus');
});

Route::get('/popup', [KelasController::class, 'scan'])->name('popup');
// Route::get('/popup-tampil-qr', [KelasController::class, 'qr'])->name('popup1');
Route::get('/popupsiswa', [TamsiswaController::class, 'scan'])->name('popup');
Route::post('validasi', [TamsiswaController::class, 'validasi'])->name('validasi');
Route::get('/popup-tampil-qr-guru', [GurukelasController::class, 'qr'])->name('popup1');
// Route::get('/absensiqrabsen', [AbsensiController::class, 'qrabsen'])->name('absensi');

Route::get('login-guru', [LoginController::class, 'showLoginFormGuru'])->name('login.guru');
Route::get('login-siswa', [LoginController::class, 'showLoginFormSiswa'])->name('login.siswa');

Route::prefix('guru')->middleware(['auth', 'auth.guru'])->group(function () {
    Route::get('beranda', [BerandaGuruController::class, 'index'])->name('guru.beranda');
    Route::resource('gurukelas', GurukelasController::class);
    Route::get('gurupertemuan/{id}', [GurukelasController::class, 'detailshow'])->name('gurupertemuan.show');
});

Route::prefix('siswa')->middleware(['auth', 'auth.siswa'])->group(function () {
    Route::get('beranda', [TamsiswaController::class, 'index'])->name('tamsiswa.index');
    Route::resource('siswakelas', SiswakelasController::class);
    Route::get('tamsiswapertemuan/{id}', [TamsiswaController::class, 'detailshow'])->name('tamsiswapertemuan.show');
});

Route::resource('pertemuan', PertemuanController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('kelas', KelasController::class);


Route::get('/', function () {
    return view('home_corona');
});

Route::get('logout', function () {
    Auth::logout();
    return view('home_corona');
})->name('logout');

Auth::routes();
