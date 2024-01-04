<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformasiSiswaController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

Route::get('/register', function () {
    return view('register.index');
})->name('register.index');

Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/informasi-pendaftaran', function () {
    return view('informasi-pendaftaran');
});


Route::get('/galeri-sekolah', function () {
    return view('galeri-sekolah');
});

Route::group(['middleware' => ['role:wali_murid']], function() {
    Route::get('/lihat-informasi-siswa', [InformasiSiswaController::class, 'index'])->name('lihat-informasi-siswa');

    Route::get('/informasi-siswa', function () {
        return view('informasi-siswa.create');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/informasi-siswa/store', [InformasiSiswaController::class, 'store'])->name('informasi-siswa.store');

    Route::get('/informasi-siswa/edit/{id}', [InformasiSiswaController::class, 'edit'])->name('informasi-siswa.edit');

    Route::patch('/informasi-siswa/update/{id}', [InformasiSiswaController::class, 'update'])->name('informasi-siswa.update');

    Route::post('/logout',[AuthController::class, 'logout'])->name('logout.logout');
});




