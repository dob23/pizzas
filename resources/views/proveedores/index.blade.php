<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <title>Listado de Proveedores</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Proveedores') }}
        </h2>
      </x-slot>
      <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('proveedores.new') }}" 
                class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ml-1 ">
                <i class="fa-solid fa-plus"></i> Nuevo Proveedor
              </a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($proveedores as $proveedor)
                      <tr>
                          <td>{{ $proveedor->id }}</td>
                          <td>{{ $proveedor->name }}</td>
                          <td>{{ $proveedor->contact_info }}</td>
                          <td>
                              <a href="{{ route('proveedores.edit', ['id' => $proveedor->id]) }}" class="btn btn-warning">Editar</a>
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
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>