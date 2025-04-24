<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Usuario') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Usuario</h1>

              <form method="POST" action="{{ route('usuarios.update', ['id' => $usuario->id]) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="id" class="form-label">Código</label>
                  <input type="text" class="form-control" id="id" name="id"
                    value="{{ $usuario->id }}" disabled>
                  <div class="form-text">Código del usuario</div>
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="{{ $usuario->name }}" required>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" id="email" name="email"
                    value="{{ $usuario->email }}" required>
                </div>

                <div class="mb-3">
                  <label for="role" class="form-label">Rol</label>
                  <select class="form-select" id="role" name="role" required>
                    <option value="cliente" {{ $usuario->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="administrador" {{ $usuario->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="cajero" {{ $usuario->role == 'cajero' ? 'selected' : '' }}>Cajero</option>
                    <option value="cocinero" {{ $usuario->role == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                    <option value="mensajero" {{ $usuario->role == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
                  </select>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk"></i> Actualizar
                  </button>
                  <a href="{{ route('usuarios.index') }}" class="btn btn-danger">
                    <i class="fa-solid fa-xmark"></i> Cancelar
                  </a>
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
