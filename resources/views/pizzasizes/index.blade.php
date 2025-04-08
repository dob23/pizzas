<!doctype html>
<html lang="es">
  <head>
    <!-- jQuery (necesario para jquery-confirm) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <title>Listado de Tamaños de Pizza</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Tamaños de Pizza') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('pizzasizes.index') }}" 
                 class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1">
                <i class="fa-solid fa-plus"></i> Nuevo tamaño
              </a>

              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Pizza</th>
                    <th scope="col">Tamaño</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pizzaSizes as $size)
                    <tr>
                      <td>{{ $size->id }}</td>
                      <td>{{ $size->pizza->name }}</td>
                      <td>{{ ucfirst($size->size) }}</td>
                      <td>${{ number_format($size->price, 2) }}</td>
                      <td>
                        <span>Acciones</span>
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
