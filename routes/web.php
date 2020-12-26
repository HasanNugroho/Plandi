<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\ManageController;
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

// Home Route
Route::get('/', [FrontController::class, 'index'])->name('home_produk');
Route::get('/checkout/{slug}', [FrontController::class, 'checkout'])->name('checkout');
Route::get('/produk', [FrontController::class, 'produk'])->name('produk.front');
// Route::get('/kategori', [ProdukController::class, 'front'])->name('home');


Route::get('/checkout', function () {
    return view('checkout');
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

// Kontak //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/contact'], function () {
    route::get('/', [ManageController::class, 'contact'])->name('contact');
    // route::post('/store', [ManageController::class, 'contact_store'])->name('add.contact');
    route::get('/{id}/edit', [ManageController::class, 'contact_edit'])->name('edit.contact');
    route::post('/{id}/update', [ManageController::class, 'contact_update'])->name('update.contact');
});

// Testimoni //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/testimoni'], function () {
    route::get('/', [TestimonyController::class, 'index'])->name('testi');
    route::post('/store', [TestimonyController::class, 'store'])->name('add.testimony');
    route::get('/{id}/edit', [TestimonyController::class, 'edit'])->name('edit.testimony');
    route::POST('/{id}/update', [TestimonyController::class, 'update'])->name('update.testimony');
    route::get('/{id}/delete', [TestimonyController::class, 'delete'])->name('delete.testimony');
});