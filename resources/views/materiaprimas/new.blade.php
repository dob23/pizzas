<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Añadir Materia Prima</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-white leading-tight">
              {{ __('Añadir Materia Prima') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      <h1 class="text-2xl font-bold mb-4">Añadir Materia Prima</h1>

                      <form method="POST" action="{{ route('materiaPrima.store') }}">
                          @csrf
                          
                          <div class="mb-3">
                              <label for="id" class="form-label">Código</label>
                              <input type="text" class="form-control" id="id" name="id" disabled>
                              <div class="form-text">Código del Proveedor</div>
                          </div>

                          <div class="mb-3">
                              <label for="name" class="form-label">Nombre de Materia Prima</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del material" required>
                          </div>

                          <div class="mb-3">
                              <label for="Contacto" class="form-label">Unidad</label>
                              <input type="text" class="form-control" id="unit" name="unit" placeholder="Unidad" required>
                          </div>

                          <div class="mb-3">
                            <label for="Contacto" class="form-label">Stock Actual</label>
                            <input type="text" class="form-control" id="current_stock" name="current_stock" placeholder="stock" required>
                        </div>

                          <div class="mt-3">
                              <button type="submit" class="btn btn-success">Guardar</button>
                              <a href="{{ route('materiaPrima.index') }}" class="btn btn-danger">Cancelar</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </x-app-layout>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
