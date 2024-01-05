<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InformasiSiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::get('/login-admin', function () {
    return view('login.index');
})->name('login.admin');

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

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.logout');

    Route::group(['middleware' => ['role:wali_murid']], function () {
        Route::get('/informasi-siswa', function () {
            return view('informasi-siswa.create');
        });
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::post('/informasi-siswa/store', [InformasiSiswaController::class, 'store'])->name('informasi-siswa.store');
    
    });
    
    Route::group(['middleware' => ['role:admin']], function() {
        Route::get('/kelulusan', function () {
            return view('kelulusan');
        });
        Route::get('/admin/wali-murid', function () {
            return view('admin.wali-murid');
        });
        Route::get('/admin/wali-murid', [UserController::class, 'index'])->name('user.index');
        Route::get('/admin/siswa', [InformasiSiswaController::class, 'index'])->name('informasi-siswa.index');
        Route::delete('/informasi-siswa/delete/{id}', [InformasiSiswaController::class, 'destroy'])->name('informasi-siswa.delete');
        Route::get('/export-informasi-siswa', [InformasiSiswaController::class, 'export'])->name('export-informasi-siswa.export');
        Route::get('/walimurid-akun/create', function() {
            return view('walimurid.create');
        });
        Route::post('/walimurid-akun/create', [UserController::class, 'store'])->name('user.store');
        Route::get('/walimurid-akun/edit/{id}', [UserController::class, 'edit'])->name('walimurid-akun.edit');
        Route::patch('/walimurid-akun/update/{id}', [UserController::class, 'update'])->name('walimurid-akun.update');
        Route::delete('/walimurid-akun/delete/{id}', [UserController::class, 'destroy'])->name('walimurid-akun.delete');
        Route::get('/export-user', [UserController::class, 'export'])->name('export.user');
    });
    
    Route::get('/lihat-informasi-siswa', [InformasiSiswaController::class, 'show'])->name('lihat-informasi-siswa');
    Route::get('/informasi-siswa/edit/{id}', [InformasiSiswaController::class, 'edit'])->name('informasi-siswa.edit');
    Route::patch('/informasi-siswa/update/{id}', [InformasiSiswaController::class, 'update'])->name('informasi-siswa.update');
});

