<?php

use App\Http\Controllers\Backend\ArtikelController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KomentarController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ObatController;
use App\Http\Controllers\Backend\PenulisController;
use App\Http\Controllers\Backend\RegisterController;
use App\Models\Artikel;
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
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/datapenulis', [PenulisController::class, 'index'])->name('datapenulis');
        Route::get('/daftarartikel', [ArtikelController::class, 'daftarartikel'])->name('daftarartikel');
        Route::get('/daftarkomentar', [KomentarController::class, 'index'])->name('daftarkomentar');
    });
    Route::group(['middleware' => ['cek_login:penulis']], function () {
        Route::get('/dashboardpenulis', [DashboardController::class, 'index'])->name('dashboardpenulis');
        Route::get('/dataartikel', [ArtikelController::class, 'index'])->name('dataartikel');
        Route::get('/tambahartikel', [ArtikelController::class, 'tambahartikel'])->name('tambahartikel');
        Route::post('/prosestambahartikel', [ArtikelController::class, 'store'])->name('prosestambahartikel');
        Route::get('/editartikel/{id}', [ArtikelController::class, 'edit'])->name('editartikel');
        Route::post('/updateartikel/{id}', [ArtikelController::class, 'update'])->name('updateartikel');
        Route::post('/deleteartikel/{id}', [ArtikelController::class, 'destroy'])->name('deleteartikel');
        Route::get('/daftarkomentarpenulis', [KomentarController::class, 'komentarpenulis'])->name('daftarkomentarpenulis');
        Route::post('/deletekomentar/{id}', [KomentarController::class, 'destroy'])->name('deletekomentar');


    });
});
Route::get('/daftar', [RegisterController::class, 'index'])->name('register');
Route::post('/prosesregistrasi', [RegisterController::class, 'registrasi'])->name('registrasi');
Route::get('/masukLogin', [LoginController::class, 'index'])->name('masuklogin');
Route::post('/authenticate', [LoginController::class, 'masukLogin'])->name('masukLogin');
Route::post('/keluarlogout', [LoginController::class, 'logout'])->name('keluarlogout');
Route::get('/dataobat', [ObatController::class, 'index'])->name('dataobat');
Route::get('/tambahobat', [ObatController::class, 'tambahobat'])->name('tambahobat');
Route::post('/prosestambahobat', [ObatController::class, 'store'])->name('prosestambahobat');
Route::get('/editobat/{id}', [ObatController::class, 'edit'])->name('editobat');
Route::post('/updateobat/{id}', [ObatController::class, 'update'])->name('updateobat');
Route::post('/deleteobat/{id}', [ObatController::class, 'destroy'])->name('deleteobat');
Route::get('/artikel', [ArtikelController::class, 'artikel'])->name('artikel');
Route::get('/detailartikel/{id}', [ArtikelController::class, 'show'])->name('detailartikel');
Route::post('/prosestambahkomentar', [KomentarController::class, 'store'])->name('prosestambahkomentar');





Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
