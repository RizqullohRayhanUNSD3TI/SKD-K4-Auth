<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;

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
    return view('welcome');
});

Auth::routes();

// Multi Auth
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('pegawai/home', [HomeController::class, 'pegawaiHome'])->name('pegawai.home')->middleware('pegawai');

// Custom Auth
Route::prefix('custom')->group(function () {
   Route::get('login', [CustomAuthController::class, 'index'])->name('customLogin');
   Route::post('prosesLogin', [CustomAuthController::class, 'prosesLogin'])->name('prosesLogin'); 
   Route::get('admin', [CustomAuthController::class, 'admin'])->name('admin')->middleware('is_admin'); 
   Route::get('pegawai', [CustomAuthController::class, 'pegawai'])->name('pegawai')->middleware('pegawai');
   Route::get('user', [CustomAuthController::class, 'user'])->name('user');
   Route::post('logout', [CustomAuthController::class, 'logout'])->name('customLogout');
});