<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MetodePembayaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔐 Semua route di bawah ini hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {

    // 🔧 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 💊 CRUD Obat
    Route::prefix('obat')->name('obat.')->group(function () {
        Route::get('/', [ObatController::class, 'index'])->name('index');
        Route::get('/create', [ObatController::class, 'create'])->name('create');
        Route::post('/', [ObatController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ObatController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ObatController::class, 'update'])->name('update');
        Route::delete('/{id}', [ObatController::class, 'destroy'])->name('destroy');
    });

    // 🚚 CRUD Supplier
    Route::prefix('suppliers')->name('suppliers.')->group(function () {
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        Route::get('/create', [SupplierController::class, 'create'])->name('create');
        Route::post('/', [SupplierController::class, 'store'])->name('store');
        Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SupplierController::class, 'update'])->name('update');
        Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('destroy');
    });

    // 🗂️ CRUD Kategori
    Route::prefix('kategoris')->name('kategoris.')->group(function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('/create', [KategoriController::class, 'create'])->name('create');
        Route::post('/', [KategoriController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
    });

    Route::middleware('auth')->group(function () {
    Route::prefix('metode_pembayaran')->name('metode_pembayaran.')->group(function () {
        Route::get('/', [MetodePembayaranController::class, 'index'])->name('index');
        Route::get('/create', [MetodePembayaranController::class, 'create'])->name('create');
        Route::post('/', [MetodePembayaranController::class, 'store'])->name('store');
        Route::get('/{id}', [MetodePembayaranController::class, 'show'])->name('show'); // opsional
        Route::get('/{id}/edit', [MetodePembayaranController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MetodePembayaranController::class, 'update'])->name('update');
        Route::delete('/{id}', [MetodePembayaranController::class, 'destroy'])->name('destroy');
    });
});

});

require __DIR__.'/auth.php';
