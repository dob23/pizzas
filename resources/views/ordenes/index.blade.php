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

    <title>Listado de Órdenes</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Órdenes') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('ordenes.new') }}" 
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1">
                <i class="fa-solid fa-plus"></i> Nueva Orden
              </a>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Precio Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Tipo Entrega</th>
                    <th scope="col">Repartidor</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ordenes as $orden)
                  <tr>
                    <td>{{ $orden->id }}</td>
                    <td>{{ $orden->cliente->user->name }}</td>
                    <td>{{ $orden->sucursal->name }}</td>
                    <td>${{ number_format($orden->total_price, 2) }}</td>
                    <td>{{ $orden->status }}</td>
                    <td>{{ $orden->delivery_type }}</td>
                    <td>{{ $orden->repartidor->name ?? 'No asignado' }}</td>
                    <td>
                      <a href="{{ route('ordenes.edit', ['id' => $orden->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('ordenes.destroy', ['id' => $orden->id]) }}" method="POST" style="display:inline;" class="delete-form">
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
