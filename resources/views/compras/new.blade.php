<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Añadir Compra</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Añadir Compra') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Añadir Compra</h1>

              <form method="POST" action="{{ route('compras.store') }}">
                @csrf

                <div class="mb-3">
                  <label for="supplier_id" class="form-label">Proveedor</label>
                  <select class="form-control" id="supplier_id" name="supplier_id" required>
                    <option value="" disabled selected>Selecciona un proveedor</option>
                    @foreach ($proveedores as $proveedor)
                      <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="raw_material_id" class="form-label">Materia Prima</label>
                  <select class="form-control" id="raw_material_id" name="raw_material_id" required>
                    <option value="" disabled selected>Selecciona una materia prima</option>
                    @foreach ($materiasPrimas as $materia)
                      <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                    @endforeach
                  </select>
                </div> 

                <div class="mb-3">
                  <label for="quantity" class="form-label">Cantidad</label>
                  <input type="number" class="form-control" id="quantity" name="quantity" step="0.01" placeholder="Cantidad comprada" required>
                </div>

                <div class="mb-3">
                    <label for="purchase_price" class="form-label">Costo Total</label>
                    <input type="number" class="form-control" id="purchase_price" name="purchase_price" step="0.01" placeholder="Costo total de la compra" required>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a href="{{ route('compras.index') }}" class="btn btn-danger">Cancelar</a>
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