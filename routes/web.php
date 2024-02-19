<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ViewController;
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

Route::group(['middleware' => ['auth', 'checkrole:admin,staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/buku', BukuController::class);
    Route::resource('/pinjam', PinjamController::class);
    Route::get('/petugas', [LoginController::class, 'index']);
    Route::get('/user', [LoginController::class, 'user']);
    Route::get('pinjam/report/{id}', [PinjamController::class, 'report']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', [ViewController::class, 'index']);
Route::group(['middleware' => ['auth', 'checkrole:user,admin,staff']], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/listbook', [BukuController::class, 'listbook']);
    Route::get('listbook/fiksi', [BukuController::class, 'listbook']);
    Route::get('listbook/detail/{id}', [BukuController::class, 'detailbook']);
    Route::resource('/ratings', RatingController::class);
    Route::resource('/koleksi', KoleksiController::class);
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login_action'])->name('login.action');
Route::get('/register', [LoginController::class, 'create']);
Route::post('/register', [LoginController::class, 'register'])->name('register');
