<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Proveedor</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Proveedor') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Proveedor</h1>

              <form method="POST" action="{{ route('proveedores.update', ['id' => $proveedores->id]) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="id" class="form-label">Código</label>
                  <input type="text" class="form-control" id="id" name="id"
                    value="{{ $proveedores->id }}" disabled>
                  <div class="form-text">Código del proveedor</div>
                </div>

                <div class="mb-3">
                  <label for="name" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="{{ $proveedores->name }}" required>
                </div>

                <div class="mb-3">
                  <label for="contact_info" class="form-label">Contacto</label>
                  <input type="text" class="form-control" id="contact_info" name="contact_info"
                    value="{{ $proveedores->contact_info }}" required>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
                  <a href="{{ route('proveedores.index') }}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </x-app-layout>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
  </body>
</html>
