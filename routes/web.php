<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/pendaftar-baru', function () {
    return view('pendaftar-baru');
});

Route::get('/lihat-informasi-siswa', function () {
    return view('lihat-informasi-siswa');
});

Route::get('/informasi-siswa', function () {
    return view('informasi-siswa');
});

Route::get('/galeri-sekolah', function () {
    return view('galeri-sekolah');
});
