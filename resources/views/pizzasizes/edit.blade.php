<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Tamaño de Pizza</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Tamaño de Pizza') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Tamaño de Pizza</h1>

              <form method="POST" action="{{ route('pizzasizes.update', $pizzaSize->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="pizza_id" class="form-label">Pizza</label>
                  <select name="pizza_id" id="pizza_id" class="form-select" required>
                    @foreach ($pizzas as $pizza)
                      <option value="{{ $pizza->id }}" {{ $pizza->id == $pizzaSize->pizza_id ? 'selected' : '' }}>
                        {{ $pizza->name }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="size" class="form-label">Tamaño</label>
                  <select name="size" id="size" class="form-select" required>
                    <option value="pequeña" {{ $pizzaSize->size == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
                    <option value="mediana" {{ $pizzaSize->size == 'mediana' ? 'selected' : '' }}>Mediana</option>
                    <option value="grande" {{ $pizzaSize->size == 'grande' ? 'selected' : '' }}>Grande</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="price" class="form-label">Precio</label>
                  <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $pizzaSize->price }}" required>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a href="{{ route('pizzasizes.index') }}" class="btn btn-danger">Cancelar</a>
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
