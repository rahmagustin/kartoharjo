<?php

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