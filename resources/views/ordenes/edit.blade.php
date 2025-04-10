<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Orden</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Orden') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Orden</h1>

              <form method="POST" action="{{ route('ordenes.update', $orden->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="client_id" class="form-label">Cliente</label>
                  <select name="client_id" id="client_id" class="form-select" required>
                    @foreach ($clientes as $cliente)
                      <option value="{{ $cliente->id }}" {{ $cliente->id == $orden->client_id ? 'selected' : '' }}>
                        {{ $cliente->user->name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="branch_id" class="form-label">Sucursal</label>
                  <select name="branch_id" id="branch_id" class="form-select" required>
                    @foreach ($sucursales as $sucursal)
                      <option value="{{ $sucursal->id }}" {{ $sucursal->id == $orden->branch_id ? 'selected' : '' }}>
                        {{ $sucursal->name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="total_price" class="form-label">Precio Total</label>
                  <input type="number" step="0.01" class="form-control" id="total_price" name="total_price" value="{{ $orden->total_price }}" required>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Estado</label>
                  <select name="status" id="status" class="form-select" required>
                    <option value="pendiente" {{ $orden->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="preparando" {{ $orden->status == 'preparando' ? 'selected' : '' }}>Preparando</option>
                    <option value="listo" {{ $orden->status == 'listo' ? 'selected' : '' }}>Listo</option>
                    <option value="entregado" {{ $orden->status == 'entregado' ? 'selected' : '' }}>Entregado</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="delivery_type" class="form-label">Tipo de Entrega</label>
                  <select name="delivery_type" id="delivery_type" class="form-select" required>
                    <option value="en local" {{ $orden->delivery_type == 'en local' ? 'selected' : '' }}>En local</option>
                    <option value="domicilio" {{ $orden->delivery_type == 'domicilio' ? 'selected' : '' }}>Domicilio</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="delivery_person_id" class="form-label">Repartidor</label>
                  <select name="delivery_person_id" id="delivery_person_id" class="form-select">
                    <option value="">-- Sin asignar --</option>
                    @foreach ($repartidores as $repartidor)
                      <option value="{{ $repartidor->id }}" {{ $repartidor->id == $orden->delivery_person_id ? 'selected' : '' }}>
                        {{ $repartidor->name }}
                      </option>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
