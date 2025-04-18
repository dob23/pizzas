<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\OrdenController;
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
//RUTAS DE EMPLEADOS
Route::middleware('auth')->group(function(){
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    Route::get('/empleados/new', [EmpleadoController::class, 'create'])->name('empleados.new');
    Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
    Route::get('/empleados/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
    Route::put('/empleados/{id}', [EmpleadoController::class, 'update'])->name('empleados.update');
    Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
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

//RUTAS DE PIZZA SIZE
Route::middleware('auth')->group(function(){
    Route::get('/pizzasizes', [PizzaSizeController::class, 'index'])->name('pizzasizes.index');
    Route::get('/pizzasizes/new', [PizzaSizeController::class, 'create'])->name('pizzasizes.new');
    Route::post('/pizzasizes', [PizzaSizeController::class, 'store'])->name('pizzasizes.store');
    Route::get('/pizzasizes/{id}/edit', [PizzaSizeController::class, 'edit'])->name('pizzasizes.edit');
    Route::put('/pizzasizes/{id}', [PizzaSizeController::class, 'update'])->name('pizzasizes.update');
    Route::delete('/pizzasizes/{id}', [PizzaSizeController::class, 'destroy'])->name('pizzasizes.destroy');
});

//RUTAS DE CLIENTES
Route::middleware('auth')->group(function(){
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/new', [ClienteController::class, 'create'])->name('clientes.new');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});

//RUTAS DE SUCURSALES
Route::middleware('auth')->group(function(){
    Route::get('/sucursales', [SucursalController::class, 'index'])->name('sucursales.index');
    Route::get('/sucursales/new', [SucursalController::class, 'create'])->name('sucursales.new');
    Route::post('/sucursales', [SucursalController::class, 'store'])->name('sucursales.store');
    Route::get('/sucursales/{id}/edit', [SucursalController::class, 'edit'])->name('sucursales.edit');
    Route::put('/sucursales/{id}', [SucursalController::class, 'update'])->name('sucursales.update');
    Route::delete('/sucursales/{id}', [SucursalController::class, 'destroy'])->name('sucursales.destroy');
});

//RUTAS DE ORDENES
Route::middleware('auth')->group(function(){
    Route::get('/ordenes', [OrdenController::class, 'index'])->name('ordenes.index');
    Route::get('/ordenes/new', [OrdenController::class, 'create'])->name('ordenes.new');
    Route::post('/ordenes', [OrdenController::class, 'store'])->name('ordenes.store');
    Route::get('/ordenes/{id}/edit', [OrdenController::class, 'edit'])->name('ordenes.edit');
    Route::put('/ordenes/{id}', [OrdenController::class, 'update'])->name('ordenes.update');
    Route::delete('/ordenes/{id}', [OrdenController::class, 'destroy'])->name('ordenes.destroy');
});
require __DIR__.'/auth.php';
