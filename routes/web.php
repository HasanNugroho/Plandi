<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\kategoriController;

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
    return view('home');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/produk', function () {
    return view('produk');
});

Auth::routes();

// Dashboard //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Produk //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/produk'], function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk');
    // add data
    Route::get('/tambah', [ProdukController::class, 'tambah']);
    Route::post('/tambah/store', [ProdukController::class, 'store'])->name('tambah.produk');
    // hapus data
    Route::get('/delete/{slug}', [ProdukController::class, 'delete'])->name('hapus.produk');
    // Edit data
    Route::get('/edit/{slug}', [ProdukController::class, 'edit'])->name('edit.produk');
    Route::post('/edit/update', [ProdukController::class, 'update'])->name('update.produk');
});
// Kategori //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/kategori'], function () {
    route::get('/', [kategoriController::class, 'index'])->name('kategori');
    // route::get('/', [kategoriController::class, 'show'])->name('show.kategori');
    route::post('/store', [kategoriController::class, 'store'])->name('add.kategori');
    route::get('/delete/{id}', [kategoriController::class, 'delete'])->name('hapus.kategori');
});