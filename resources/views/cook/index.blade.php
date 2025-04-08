@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos para Preparar</h1>
    
    <div class="list-group">
        @foreach($orders as $order)
        <div class="list-group-item mb-3">
            <div class="d-flex justify-content-between">
                <h5>Pedido #{{ $order->id }} - {{ $order->created_at->format('d/m/Y H:i') }}</h5>
                <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : 'info' }} text-dark">
                    {{ str_replace('_', ' ', $order->status) }}
                </span>
            </div>
            
            <ul class="list-group mt-2">
                @foreach($order->items as $item)
                <li class="list-group-item">
                    {{ $item->quantity }}x {{ $item->pizza->name }} ({{ $item->size->size }})
                    @if($item->extraIngredients->count())
                        <div class="mt-1">
                            <small class="text-muted">Extras:</small>
                            @foreach($item->extraIngredients as $extra)
                                <span class="badge bg-secondary">{{ $extra->ingredient->name }} ({{ $extra->quantity }})</span>
                            @endforeach
                        </div>
                    @endif
                </li>
                @endforeach
            </ul>
            
            <form action="{{ route('cook.update-status', $order) }}" method="POST" class="mt-2">
                @csrf
                @method('PUT')
                <button type="submit" name="status" value="preparing" class="btn btn-sm btn-primary" 
                    {{ $order->status !== 'pending' ? 'disabled' : '' }}>
                    Empezar a preparar
                </button>
                <button type="submit" name="status" value="ready" class="btn btn-sm btn-success" 
                    {{ $order->status !== 'preparing' ? 'disabled' : '' }}>
                    Marcar como listo
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
