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

Route::get('/rfid', function () {
    return view('rfid');
});
Route::resource('profile', ProfileController::class);

Route::middleware(['auth:user,siswa,guru'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    
});

require __DIR__.'/auth.php';

Route::middleware(['auth:guru','jabatanRole:kurikulum,guru'])->group(function () {
    
    Route::resource('siswa', SiswaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('jadwalmapel', JadwalController::class);
});
Route::resource('mapel', MapelController::class);
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
Route::get('edit/{akun}', [SiswaController::class, 'editakun'])->name('akun.edit');
Route::put('update/{akun}', [SiswaController::class, 'updateakun'])->name('akun.update');
Route::get('show/{akun}', [SiswaController::class, 'showakun'])->name('akun.show');
Route::get('/search', [GuruController::class, 'search'])->name('search');