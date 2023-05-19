<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ObatController;
use App\Http\Controllers\Backend\RegisterController;
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
    return view('backend/login');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/daftar', [RegisterController::class, 'index'])->name('register');
Route::post('/prosesregistrasi', [RegisterController::class, 'registrasi'])->name('registrasi');
Route::get('/masukLogin', [LoginController::class, 'index'])->name('masuklogin');
Route::post('/authenticate', [LoginController::class, 'masukLogin'])->name('masukLogin');
Route::post('/keluarlogout', [LoginController::class, 'logout'])->name('keluarlogout');
Route::get('/dataobat', [ObatController::class, 'index'])->name('dataobat');
Route::get('/tambahobat', [ObatController::class, 'tambahobat'])->name('tambahobat');
Route::post('/prosestambahobat', [ObatController::class, 'store'])->name('prosestambahobat');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
