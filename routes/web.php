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

// Route::get('/', function () {
//     return view('template.template');
// });


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
});
use App\Http\Controllers\GuruController;
Route::get('/search', [GuruController::class, 'search'])->name('search');