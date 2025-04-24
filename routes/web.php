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
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // RUTAS DE EMPLEADOS (solo super_admin, administrador)
    Route::get('/empleados', [EmpleadoController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('empleados.index');
    Route::get('/empleados/new', [EmpleadoController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('empleados.new');
    Route::post('/empleados', [EmpleadoController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('empleados.store');
    Route::get('/empleados/{id}/edit', [EmpleadoController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('empleados.edit');
    Route::put('/empleados/{id}', [EmpleadoController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('empleados.update');
    Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('empleados.destroy');

    // RUTAS DE PROVEEDORES (super_admin, administrador, gerente_sucursal, almacenista)
    Route::get('/proveedores', [ProveedorController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('proveedores.index');
    Route::get('/proveedores/new', [ProveedorController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('proveedores.new');
    Route::post('/proveedores', [ProveedorController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('proveedores.store');
    Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('proveedores.edit');
    Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('proveedores.update');
    Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('proveedores.destroy');

    // RUTAS DE MATERIA PRIMA (super_admin, administrador, gerente_sucursal, almacenista)
    Route::get('/materiaprimas', [MateriaPrimaController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('materiaPrima.index');
    Route::get('/materiaprimas/new', [MateriaPrimaController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('materiaPrima.new');
    Route::post('/materiaprimas', [MateriaPrimaController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('materiaPrima.store');
    Route::get('/materiaprimas/{id}/edit', [MateriaPrimaController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('materiaPrima.edit');
    Route::put('/materiaprimas/{id}', [MateriaPrimaController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('materiaPrima.update');
    Route::delete('/materiaprimas/{id}', [MateriaPrimaController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('materiaPrima.destroy');

    // RUTAS DE COMPRAS (super_admin, administrador, gerente_sucursal, almacenista)
    Route::get('/compras', [CompraController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('compras.index');
    Route::get('/compras/new', [CompraController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('compras.new');
    Route::post('/compras', [CompraController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('compras.store');
    Route::get('/compras/{id}/edit', [CompraController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('compras.edit');
    Route::put('/compras/{id}', [CompraController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('compras.update');
    Route::delete('/compras/{id}', [CompraController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal,almacenista')
        ->name('compras.destroy');

    // RUTAS DE USUARIOS (solo super_admin, administrador)
    Route::get('/usuarios', [UserController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('usuarios.index');
    Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('usuarios.edit');
    Route::post('/usuarios', [UserController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('usuarios.store');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador')
        ->name('usuarios.destroy');

    // RUTAS DE PIZZAS (super_admin, administrador, gerente_sucursal)
    Route::get('/pizzas', [PizzaController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzas.index');
    Route::get('/pizzas/new', [PizzaController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzas.new');
    Route::post('/pizzas', [PizzaController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzas.store');
    Route::get('/pizzas/{id}/edit', [PizzaController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzas.edit');
    Route::put('/pizzas/{id}', [PizzaController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzas.update');
    Route::delete('/pizzas/{id}', [PizzaController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzas.destroy');

    // RUTAS DE PIZZA SIZE (super_admin, administrador, gerente_sucursal)
    Route::get('/pizzasizes', [PizzaSizeController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzasizes.index');
    Route::get('/pizzasizes/new', [PizzaSizeController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzasizes.new');
    Route::post('/pizzasizes', [PizzaSizeController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzasizes.store');
    Route::get('/pizzasizes/{id}/edit', [PizzaSizeController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzasizes.edit');
    Route::put('/pizzasizes/{id}', [PizzaSizeController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzasizes.update');
    Route::delete('/pizzasizes/{id}', [PizzaSizeController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('pizzasizes.destroy');

    // RUTAS DE CLIENTES (super_admin, administrador, cajero)
    Route::get('/clientes', [ClienteController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero')
        ->name('clientes.index');
    Route::get('/clientes/new', [ClienteController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero')
        ->name('clientes.new');
    Route::post('/clientes', [ClienteController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero')
        ->name('clientes.store');
    Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero')
        ->name('clientes.edit');
    Route::put('/clientes/{id}', [ClienteController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero')
        ->name('clientes.update');
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero')
        ->name('clientes.destroy');

    // RUTAS DE SUCURSALES (super_admin, administrador, gerente_sucursal)
    Route::get('/sucursales', [SucursalController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('sucursales.index');
    Route::get('/sucursales/new', [SucursalController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('sucursales.new');
    Route::post('/sucursales', [SucursalController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('sucursales.store');
    Route::get('/sucursales/{id}/edit', [SucursalController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('sucursales.edit');
    Route::put('/sucursales/{id}', [SucursalController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('sucursales.update');
    Route::delete('/sucursales/{id}', [SucursalController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,gerente_sucursal')
        ->name('sucursales.destroy');

    // RUTAS DE ÓRDENES (super_admin, administrador, cajero, cocinero, mensajero, cliente)
    Route::get('/ordenes', [OrdenController::class, 'index'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero,cocinero,mensajero,cliente')
        ->name('ordenes.index');
    Route::get('/ordenes/new', [OrdenController::class, 'create'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero,cocinero,mensajero,cliente')
        ->name('ordenes.new');
    Route::post('/ordenes', [OrdenController::class, 'store'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero,cocinero,mensajero,cliente')
        ->name('ordenes.store');
    Route::get('/ordenes/{id}/edit', [OrdenController::class, 'edit'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero,cocinero,mensajero,cliente')
        ->name('ordenes.edit');
    Route::put('/ordenes/{id}', [OrdenController::class, 'update'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero,cocinero,mensajero,cliente')
        ->name('ordenes.update');
    Route::delete('/ordenes/{id}', [OrdenController::class, 'destroy'])
        ->middleware(CheckRole::class . ':super_admin,administrador,cajero,cocinero,mensajero,cliente')
        ->name('ordenes.destroy');
});

require __DIR__.'/auth.php';
