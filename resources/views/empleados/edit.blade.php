<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Empleado</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Editar Empleado') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <h1 class="text-2xl font-bold mb-4">Editar Empleado</h1>

              <form method="POST" action="{{ route('empleados.update', $empleado->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="user_id" class="form-label">Usuario</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                      <option value="" disabled>Selecciona un usuario</option>
                      @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $empleado->user_id == $usuario->id ? 'selected' : '' }}>
                          {{ $usuario->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                <div class="mb-3">
                  <label for="position" class="form-label">Cargo</label>
                  <select class="form-control" id="position" name="position" required>
                    <option value="" disabled>Selecciona un cargo</option>
                    <option value="cajero" {{ $empleado->position == 'cajero' ? 'selected' : '' }}>Cajero</option>
                    <option value="administrador" {{ $empleado->position == 'administrador' ? 'selected' : '' }}>Administrador</option>
                    <option value="cocinero" {{ $empleado->position == 'cocinero' ? 'selected' : '' }}>Cocinero</option>
                    <option value="mensajero" {{ $empleado->position == 'mensajero' ? 'selected' : '' }}>Mensajero</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="identification_number" class="form-label">Número de Identificación</label>
                  <input type="text" class="form-control" id="identification_number" name="identification_number" maxlength="20" value="{{ $empleado->identification_number }}" required>
                </div>

                <div class="mb-3">
                  <label for="salary" class="form-label">Salario</label>
                  <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="{{ $empleado->salary }}" required>
                </div>

                <div class="mb-3">
                  <label for="hire_date" class="form-label">Fecha de Contratación</label>
                  <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ $empleado->hire_date }}" required>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <a href="{{ route('empleados.index') }}" class="btn btn-danger">Cancelar</a>
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
