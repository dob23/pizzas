<!doctype html>
<html lang="en">
  <head>
    <!-- jQuery (necesario si usarás confirmaciones como en materia prima) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <title>Listado de Pedidos</title>
  </head>
  <body>
    <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
          {{ __('Pedidos') }}
        </h2>
      </x-slot>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
              <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">
                <i class="fa fa-plus"></i> Nuevo Pedido
              </a>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Sucursal</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->client->user->name }}</td>
                      <td>{{ $order->branch->name }}</td>
                      <td>
                        @if($order->type == 'delivery')
                          <span class="badge bg-primary">Delivery</span>
                        @elseif($order->type == 'pickup')
                          <span class="badge bg-info text-dark">Recoger</span>
                        @else
                          <span class="badge bg-secondary">En local</span>
                        @endif
                      </td>
                      <td>
                        @if($order->status == 'pending')
                          <span class="badge bg-warning text-dark">Pendiente</span>
                        @elseif($order->status == 'preparing')
                          <span class="badge bg-info text-dark">En preparación</span>
                        @elseif($order->status == 'ready')
                          <span class="badge bg-success">Listo</span>
                        @elseif($order->status == 'on_delivery')
                          <span class="badge bg-primary">En entrega</span>
                        @elseif($order->status == 'delivered')
                          <span class="badge bg-secondary">Entregado</span>
                        @else
                          <span class="badge bg-danger">Cancelado</span>
                        @endif
                      </td>
                      <td>${{ number_format($order->total, 2) }}</td>
                      <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                      <td>
                        <a href="{{ route('orders.show', ['order' => $order->id]) }}" class="btn btn-sm btn-primary">Ver</a>
                        <a href="{{ route('orders.edit', ['order' => $order->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"
                            onclick="return confirm('¿Estás seguro de eliminar este pedido?')">
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Paginación -->
              <div class="d-flex justify-content-center">
                {{ $orders->links() }}
              </div>
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
