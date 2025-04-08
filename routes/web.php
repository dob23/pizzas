<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\OrderController;

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
    Route::get('/compras/new', [CompraController::class, 'create'])->name('compras.new');
    Route::post('/compras', [CompraController::class, 'store'])->name('compras.store');
    Route::get('/compras/{id}/edit', [CompraController::class, 'edit'])->name('compras.edit');
    Route::put('/compras/{id}', [CompraController::class, 'update'])->name('compras.update');
    Route::delete('/compras/{id}', [CompraController::class, 'destroy'])->name('compras.destroy');

});

// Rutas para clientes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

// Rutas para cocineros
Route::prefix('cook')->middleware(['auth', 'role:cocinero'])->group(function () {
    Route::get('/', [CookController::class, 'index'])->name('cook.index');
    Route::put('/orders/{order}/status', [CookController::class, 'updateStatus'])->name('cook.update-status');
});

// Rutas para mensajeros
Route::prefix('delivery')->middleware(['auth', 'role:mensajero'])->group(function () {
    Route::get('/', [DeliveryController::class, 'index'])->name('delivery.index');
    Route::put('/orders/{order}/status', [DeliveryController::class, 'updateStatus'])->name('delivery.update-status');
});

require __DIR__.'/auth.php';
