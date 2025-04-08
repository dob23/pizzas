@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos para Entregar</h1>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pedido #</th>
                    <th>Cliente</th>
                    <th>Sucursal</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->client->user->name }}</td>
                    <td>{{ $order->branch->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status === 'ready' ? 'warning' : 'info' }} text-dark">
                            {{ str_replace('_', ' ', $order->status) }}
                        </span>
                    </td>
                    <td>
                        <form action="{{ route('delivery.update-status', $order) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="status" value="on_delivery" class="btn btn-sm btn-primary" 
                                {{ $order->status !== 'ready' ? 'disabled' : '' }}>
                                Salir a entregar
                            </button>
                            <button type="submit" name="status" value="delivered" class="btn btn-sm btn-success" 
                                {{ $order->status !== 'on_delivery' ? 'disabled' : '' }}>
                                Marcar como entregado
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection