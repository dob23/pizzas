<!doctype html>
<html lang="es">
  <head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <title>Listado de Usuarios</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Usuarios') }}
        </h2>
      </x-slot>
      
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('usuarios.index') }}" 
                 class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1">
                <i class="fa-solid fa-plus"></i> Nuevo Usuario
              </a>

              <table class="table mt-3">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($usuarios as $usuario)
                    <tr>
                      <td>{{ $usuario->id }}</td>
                      <td>{{ $usuario->name }}</td>
                      <td>{{ $usuario->email }}</td>
                      <td>
                        <select class="form-select role-select" name="role" disabled data-user-id="{{ $usuario->id }}">
                          <option value="cliente" {{ $usuario->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                          <option value="administrador" {{ $usuario->role == 'administrador' ? 'selected' : '' }}>Administrador</option>
                          <option value="cajero" {{ $usuario->role == 'cajero' ? 'selected' : '' }}>Cajero</option>
                          <option value="cocinero" {{ $usuario->role == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                          <option value="mensajero" {{ $usuario->role == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
                        </select>
                      </td>
                      <td>
                        <span >Acciones</span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/delete.js'])
  </body>
</html>
