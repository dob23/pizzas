<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <title>Añadir Orden</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-white leading-tight">
              {{ __('Añadir Orden') }}
          </h2>
      </x-slot>

      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      <h1 class="text-2xl font-bold mb-4">Añadir Orden</h1>

                      <form method="POST" action="{{ route('ordenes.store') }}">
                          @csrf

                          <div class="mb-3">
                              <label for="client_id" class="form-label">Cliente</label>
                              <select class="form-select" id="client_id" name="client_id" required>
                                  @foreach ($clientes as $cliente)
                                      <option value="{{ $cliente->id }}">{{ $cliente->user->name }}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="branch_id" class="form-label">Sucursal</label>
                              <select class="form-select" id="branch_id" name="branch_id" required>
                                  @foreach ($sucursales as $sucursal)
                                      <option value="{{ $sucursal->id }}">{{ $sucursal->name }}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="total_price" class="form-label">Precio Total</label>
                              <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" placeholder="0.00" required>
                          </div>

                          <div class="mb-3">
                              <label for="status" class="form-label">Estado</label>
                              <select class="form-select" id="status" name="status" required>
                                  <option value="pendiente">Pendiente</option>
                                  <option value="preparando">Preparando</option>
                                  <option value="listo">Listo</option>
                                  <option value="entregado">Entregado</option>
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="delivery_type" class="form-label">Tipo de Entrega</label>
                              <select class="form-select" id="delivery_type" name="delivery_type" required>
                                  <option value="en local">En local</option>
                                  <option value="domicilio">Domicilio</option>
                              </select>
                          </div>

                          <div class="mb-3">
                              <label for="delivery_person_id" class="form-label">Repartidor</label>
                              <select class="form-select" id="delivery_person_id" name="delivery_person_id">
                                  <option value="">No asignado</option>
                                  @foreach ($repartidores as $empleado)
                                      <option value="{{ $empleado->id }}">{{ $empleado->name }}</option>
                                  @endforeach
                              </select>
                          </div>

                          <div class="mt-3">
                              <button type="submit" class="btn btn-success">Guardar</button>
                              <a href="{{ route('ordenes.index') }}" class="btn btn-danger">Cancelar</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>
