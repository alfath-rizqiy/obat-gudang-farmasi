<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KemasanController;
use App\Http\Controllers\AturanPakaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::middleware(['auth'])->group(function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');

    Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
});
    Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('index');
    Route::get('/create', [SupplierController::class, 'create'])->name('create');
    Route::post('/', [SupplierController::class, 'store'])->name('store');
    Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show');

    // ✅ CRUD lengkap
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('destroy');
});

    Route::prefix('kemasans')->name('kemasans.')->group(function () {
    Route::get('/', [KemasanController::class, 'index'])->name('index');
    Route::get('/create', [KemasanController::class, 'create'])->name('create');
    Route::post('/', [KemasanController::class, 'store'])->name('store');
    Route::get('/{kemasan}', [KemasanController::class, 'show'])->name('show');

    // ✅ CRUD lengkap
    Route::get('/{id}/edit', [KemasanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KemasanController::class, 'update'])->name('update');
    Route::delete('/{id}', [KemasanController::class, 'destroy'])->name('destroy');
});

Route::prefix('aturanpakais')->name('aturanpakais.')->group(function () {
    Route::get('/', [AturanPakaiController::class, 'index'])->name('index');
    Route::get('/create', [AturanPakaiController::class, 'create'])->name('create');
    Route::post('/', [AturanPakaiController::class, 'store'])->name('store');
    Route::get('/{aturanpakai}', [AturanPakaiController::class, 'show'])->name('show');

    // ✅ CRUD lengkap
    Route::get('/{id}/edit', [AturanPakaiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AturanPakaiController::class, 'update'])->name('update');
    Route::delete('/{id}', [AturanPakaiController::class, 'destroy'])->name('destroy');
});
});

require __DIR__.'/auth.php';
