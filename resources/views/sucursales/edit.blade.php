<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Sucursal</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Sucursal') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Sucursal</h1>

              <form method="POST" action="{{ route('sucursales.update', $sucursal->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $sucursal->name }}" required>
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Dirección</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ $sucursal->address }}">
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="{{ $sucursal->phone }}">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Correo Electrónico</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ $sucursal->email }}">
                </div>

                <div class="mb-3">
                  <label for="manager_id" class="form-label">ID del Encargado</label>
                  <input type="number" class="form-control" id="manager_id" name="manager_id" value="{{ $sucursal->manager_id }}">
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a href="{{ route('sucursales.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
