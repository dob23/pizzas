<!doctype html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Pedidos</title>
  </head>
  <body>
   <div class="container">
    
   <h1>Listado de Pedidos</h1>
   <a href="{{ route('orders.create') }}" class="btn btn-success">Nuevo Pedido</a>
    <table class="table table-striped mt-3">
   <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cliente</th>
      <th scope="col">Sucursal</th>
      <th scope="col">Tipo</th>
      <th scope="col">Estado</th>
      <th scope="col">Total</th>
      <th scope="col">Fecha</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  
  <tbody>
  @foreach($orders as $order)
    <tr>
      <th scope="row">{{ $order->id }}</th>
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
        <a href="{{ route('orders.show', ['order' => $order->id]) }}" 
           class="btn btn-sm btn-primary">Ver</a>
           
        <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
           class="btn btn-sm btn-warning">Editar</a>
           
        <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" 
              method="POST" style="display: inline-block">
            @method('delete')
            @csrf
            <input class="btn btn-sm btn-danger" type="submit" value="Eliminar"
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

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   </div>
  </body>
</html>