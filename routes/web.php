<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/loginlagi', [LoginController::class, 'loginku'])->name('loginlagi');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Route::post('/beranda', [HomeController::class, 'beranda'])->name('beranda');

Route::get('/kegiatan', [KegiatanController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('user/profile', function () {

})->middleware('auth');

use App\Http\Middleware\CheckUser;

Route::get('user/profile', function () {

})->middleware(CheckUser::class);

Route::get('/beranda', function () {
    return view('beranda');
});

Route::get('/kunjungan', function () {
    return view('kunjungan');
});

Route::get('/pengajuan', function () {
    return view('pengajuan');
});


// Rute untuk menampilkan halaman login
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Rute untuk menangani proses login
Route::post('/login', [LoginController::class, 'loginku'])->name('login.ku');

// Rute untuk halaman beranda setelah login
Route::get('/beranda', function () {
    // Definisikan logika atau tampilan yang sesuai untuk halaman beranda di sini
})->name('beranda')->middleware('auth');

