<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Cliente</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Cliente') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Cliente</h1>

              <form method="POST" action="{{ route('clientes.update', ['id' => $cliente->id]) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="user_id" class="form-label">Usuario</label>
                  <select class="form-control" id="user_id" name="user_id" disabled>
                    <option value="{{ $cliente->user->id }}" selected>{{ $cliente->user->name }}</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Dirección</label>
                  <input type="text" class="form-control" id="address" name="address"
                         value="{{ $cliente->address }}">
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="phone" name="phone"
                         value="{{ $cliente->phone }}">
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                  <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
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
