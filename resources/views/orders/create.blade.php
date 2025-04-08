@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Realizar Pedido</h1>
    
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Tipo de pedido</label>
            <select name="type" class="form-select" required>
                <option value="delivery">Delivery</option>
                <option value="pickup">Recoger en local</option>
                <option value="in_store">Consumir en local</option>
            </select>
        </div>
        
        <div id="delivery-info" style="display: none;">
            <div class="mb-3">
                <label class="form-label">Dirección de entrega</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="phone" class="form-control">
            </div>
        </div>
        
        <div class="mb-3">
            <h3>Pizzas</h3>
            <div id="pizza-items">
                <!-- Aquí se agregarán dinámicamente las pizzas seleccionadas -->
            </div>
            <button type="button" class="btn btn-secondary" id="add-pizza">Agregar Pizza</button>
        </div>
        
        <button type="submit" class="btn btn-primary">Realizar Pedido</button>
    </form>
</div>

<!-- Modal para seleccionar pizza -->
<div class="modal fade" id="pizzaModal" tabindex="-1" aria-hidden="true">
    <!-- Contenido del modal para seleccionar pizza, tamaño y extras -->
</div>

<script>
// JavaScript para manejar la lógica del formulario
document.getElementById('add-pizza').addEventListener('click', function() {
    // Abrir modal para seleccionar pizza
    $('#pizzaModal').modal('show');
});

// Mostrar/ocultar campos de delivery según selección
document.querySelector('select[name="type"]').addEventListener('change', function() {
    const deliveryInfo = document.getElementById('delivery-info');
    deliveryInfo.style.display = this.value === 'delivery' ? 'block' : 'none';
});
</script>
@endsection