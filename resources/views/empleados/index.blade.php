<!doctype html>
<html lang="en">
  <head>
    <!-- jQuery (necesario para jquery-confirm) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery Confirm -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <title>Listado de Empleados</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Empleados') }}
        </h2>
      </x-slot>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('empleados.new') }}" 
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1 ">
                <i class="fa-solid fa-plus"></i> Nuevo Empleado
              </a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Fecha de Contratación</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($empleados as $empleado)
                  <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->user->name }}</td> 
                    <td>{{ $empleado->position }}</td>
                    <td>${{ number_format($empleado->salary, 2) }}</td>
                    <td>{{ $empleado->hire_date }}</td>
                    <td>
                      <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning">Editar</a>
                      <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este empleado?')">
                            Eliminar
                        </button>
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

    <!-- Bootstrap Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    @vite(['resources/js/delete.js'])
  </body>
</html>
