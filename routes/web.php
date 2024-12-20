<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    BarangController as AdminBarangController,
    BarangMasukController as AdminBarangMasukController,
    BarangKeluarController as AdminBarangKeluarController,
    ManajemenUserController as AdminManajemenUserController
};
use App\Http\Controllers\User\{
    DashboardController as UserDashboardController,
    BarangController as UserBarangController,
    BarangMasukController as UserBarangMasukController,
    BarangKeluarController as UserBarangKeluarController
};

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

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticationLogin'])->name('akses.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('checkRole:admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('barang')->name('barang.')->group(function () {
        Route::get('/', [AdminBarangController::class, 'index'])->name('index');
        Route::get('/create', [AdminBarangController::class, 'create'])->name('create');
        Route::post('/create', [AdminBarangController::class, 'store'])->name('store');
        Route::get('{kode_barang}/edit', [AdminBarangController::class, 'edit'])->name('edit');
        Route::put('{kode_barang}', [AdminBarangController::class, 'update'])->name('update');
        Route::delete('{kode_barang}', [AdminBarangController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('barang-masuk')->name('barang-masuk.')->group(function () {
        Route::get('/', [AdminBarangMasukController::class, 'index'])->name('index');
        Route::get('/create', [AdminBarangMasukController::class, 'create'])->name('create');
        Route::post('/create', [AdminBarangMasukController::class, 'store'])->name('store');
        Route::delete('{no_barang_masuk}', [AdminBarangMasukController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('barang-keluar')->name('barang-keluar.')->group(function () {
        Route::get('/', [AdminBarangKeluarController::class, 'index'])->name('index');
        Route::get('/create', [AdminBarangKeluarController::class, 'create'])->name('create');
        Route::post('/create', [AdminBarangKeluarController::class, 'store'])->name('store');
        Route::delete('{no_barang_keluar}', [AdminBarangKeluarController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [AdminManajemenUserController::class, 'index'])->name('index');
        Route::get('/create', [AdminManajemenUserController::class, 'create'])->name('create');
        Route::post('/create', [AdminManajemenUserController::class, 'store'])->name('store');
        Route::get('{id_user}/edit', [AdminManajemenUserController::class, 'edit'])->name('edit');
        Route::put('{id_user}', [AdminmanajemenUserController::class, 'update'])->name('update');
        Route::delete('{id_user}', [AdminManajemenUserController::class, 'destroy'])->name('destroy');
    });
});


Route::prefix('user')->name('user.')->middleware('checkRole:user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('barang')->name('barang.')->group(function () {
        Route::get('/', [UserBarangController::class, 'index'])->name('index');
        Route::get('/create', [UserBarangController::class, 'create'])->name('create');
        Route::post('/create', [UserBarangController::class, 'store'])->name('store');
        Route::get('{kode_barang}/edit', [UserBarangController::class, 'edit'])->name('edit');
        Route::put('{kode_barang}', [UserBarangController::class, 'update'])->name('update');
        Route::delete('{kode_barang}', [UserBarangController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('barang-masuk')->name('barang-masuk.')->group(function () {
        Route::get('/', [UserBarangMasukController::class, 'index'])->name('index');
        Route::get('/create', [UserBarangMasukController::class, 'create'])->name('create');
        Route::post('/create', [UserBarangMasukController::class, 'store'])->name('store');
        Route::delete('{no_barang_masuk}', [UserBarangMasukController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('barang-keluar')->name('barang-keluar.')->group(function () {
        Route::get('/', [UserBarangKeluarController::class, 'index'])->name('index');
        Route::get('/create', [UserBarangKeluarController::class, 'create'])->name('create');
        Route::post('/create', [UserBarangKeluarController::class, 'store'])->name('store');
        Route::delete('{no_barang_keluar}', [UserBarangKeluarController::class, 'destroy'])->name('destroy');
    });
});
