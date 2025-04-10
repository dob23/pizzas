<!doctype html>
<html lang="es">
  <head>
    <!-- jQuery y jQuery Confirm -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>

    <!-- Meta y Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <title>Listado de Sucursales</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Sucursales') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('sucursales.new') }}" 
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1">
                <i class="fa-solid fa-plus"></i> Nueva Sucursal
              </a>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sucursales as $sucursal)
                  <tr>
                    <td>{{ $sucursal->id }}</td>
                    <td>{{ $sucursal->name }}</td>
                    <td>{{ $sucursal->address }}</td>
                    <td>{{ $sucursal->phone ?? 'No especificado' }}</td>
                    <td>{{ $sucursal->email ?? 'No especificado' }}</td>
                    <td>
                        <a href="{{ route('sucursales.edit', ['id' => $sucursal->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('sucuersales.destroy', ['id' => $sucursal->id]) }}" method="POST" style="display:inline;" class="delete-form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @vite(['resources/js/delete.js'])
  </body>
</html>
