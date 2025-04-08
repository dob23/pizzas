<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;

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


//RUTAS DE USUARIOS
Route::middleware('auth')->group(function(){
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');;
    Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
});

//RUTAS DE PIZZA
Route::middleware('auth')->group(function(){
    Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
    Route::get('/pizzas/new', [PizzaController::class, 'create'])->name('pizzas.new');
    Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
    Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
    Route::put('/pizzas/{id}', [PizzaController::class, 'update'])->name('pizzas.update');
    Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');

});
require __DIR__.'/auth.php';
