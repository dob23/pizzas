<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\CompraController;

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
});

//RUTAS DE PROVEEDORES
Route::middleware('auth')->group(function(){
    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
    Route::get('/proveedores/new', [ProveedorController::class, 'create'])->name('proveedores.new');
    Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
    Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
    Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
    Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');
});

//RUTAS DE MATERIA PRIMA
Route::middleware('auth')->group(function(){
    Route::get('/materiaprimas', [MateriaPrimaController::class, 'index'])->name('materiaPrima.index');
    Route::get('/materiaprimas/new', [MateriaPrimaController::class, 'create'])->name('materiaPrima.new');
    Route::post('/materiaprimas', [MateriaPrimaController::class, 'store'])->name('materiaPrima.store');
    Route::get('/materiaprimas/{id}/edit', [MateriaPrimaController::class, 'edit'])->name('materiaPrima.edit');
    Route::put('/materiaprimas/{id}', [MateriaPrimaController::class, 'update'])->name('materiaPrima.update');
    Route::delete('/materiaprimas/{id}', [MateriaPrimaController::class, 'destroy'])->name('materiaPrima.destroy');
});
    
//RUTAS DE COMPRAS 
Route::middleware('auth')->group(function(){
    Route::get('/compras', [CompraController::class, 'index'])->name('compras.index');
});
require __DIR__.'/auth.php';
