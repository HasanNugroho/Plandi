<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\DashboardController;
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
Route::group(['middleware' => ['VisitorCount'], 'prefix' => '/'], function() {
    Route::get('', [FrontController::class, 'index'])->name('home_produk');
    Route::get('produk/{slug}', [FrontController::class, 'checkout'])->name('checkout');
    Route::get('produk', [FrontController::class, 'produk'])->name('produk.front');
    Route::get('search', [ProdukController::class, 'search'])->name('search');
});
// Route::get('/kategori', [ProdukController::class, 'front'])->name('home');


Auth::routes();

// Dashboard //
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboardstart')->middleware(['auth', 'VisitorCount']); //general
// Route::get('/', [DashboardController::class, 'index'])->name('home');

// Profile setting //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Khusus Superadmin
Route::group(['middleware' => ['auth', 'Superadmin'], 'prefix' => '/dashboard/admin/'], function () {
    Route::get('manage', [ProfileController::class, 'manage'])->name('admin.manage');
    Route::post('manage/store', [ProfileController::class, 'store'])->name('add.admin');
    Route::get('manage/{id}/edit', [ProfileController::class, 'edit'])->name('edit.admin');
    Route::post('manage/update', [ProfileController::class, 'update2'])->name('update.admin');
    Route::get('manage/{id}/delete', [ProfileController::class, 'delete'])->name('delete.admin');

});

// Admin profile //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/profile'], function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Produk //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/produk'], function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk');
    // add data
    Route::get('/tambah', [ProdukController::class, 'tambah']);
    Route::post('/tambah/store', [ProdukController::class, 'store'])->name('tambah.produk');
    // hapus data
    Route::get('/delete/{id}', [ProdukController::class, 'delete'])->name('hapus.produk');
    // Edit data
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit.produk');
    Route::post('/edit/update', [ProdukController::class, 'update'])->name('update.produk');
});

// Kategori //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/kategori'], function () {
    route::get('/', [kategoriController::class, 'index'])->name('kategori');
    // route::get('/', [kategoriController::class, 'show'])->name('show.kategori');
    route::post('/store', [kategoriController::class, 'store'])->name('add.kategori');
    route::get('/delete/{id}', [kategoriController::class, 'delete'])->name('hapus.kategori');
});

// keyword //
Route::group(['middleware' => ['auth'], 'prefix' => '/dashboard/keyword'], function () {
    route::get('/', [ManageController::class, 'index'])->name('keyword');
    // route::get('/', [kategoriController::class, 'show'])->name('show.kategori');
    route::post('/store', [ManageController::class, 'store'])->name('add.keyword');
    route::get('/delete/{id}', [ManageController::class, 'delete'])->name('hapus.keyword');
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