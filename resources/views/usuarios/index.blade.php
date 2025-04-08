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
              <!-- Botón para abrir el modal -->
              <button type="button" 
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1"
                data-bs-toggle="modal" data-bs-target="#nuevoUsuarioModal">
                <i class="fa-solid fa-plus"></i> Nuevo Usuario
              </button>

              <!-- Tabla de usuarios -->
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
                        <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('usuarios.destroy', ['id' => $usuario->id]) }}" method="POST" style="display:inline;" class="delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Modal para registrar nuevo usuario -->
              <div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" aria-labelledby="nuevoUsuarioModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{ route('usuarios.store') }}">
                      @csrf
                      <div class="modal-header">
                        <h5 class="modal-title" id="nuevoUsuarioModalLabel">Registrar Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="name" class="form-label">Nombre</label>
                          <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Correo electrónico</label>
                          <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                          <label for="role" class="form-label">Rol</label>
                          <select name="role" class="form-select" id="role" required>
                            <option value="cliente">Cliente</option>
                            <option value="administrador">Administrador</option>
                            <option value="cajero">Cajero</option>
                            <option value="cocinero">Cocinero</option>
                            <option value="mensajero">Mensajero</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Contraseña</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Fin del modal -->
              
            </div>
          </div>
        </div>
      </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/delete.js'])
  </body>
</html>
