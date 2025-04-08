@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Realizar Pedido</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <!-- Tipo de Pedido -->
        <div class="mb-3">
            <label class="form-label">Tipo de pedido</label>
            <select name="type" class="form-select" required>
                <option value="delivery">Delivery</option>
                <option value="pickup">Recoger en local</option>
                <option value="in_store">Consumir en local</option>
            </select>
        </div>

        <!-- Info de Delivery -->
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

        <!-- Ingredientes Extra -->
        <div class="mb-3">
            <h4>Ingredientes Extra</h4>
            @foreach ($ingredientes as $ingrediente)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="ingredientes[]" value="{{ $ingrediente->id }}" id="ingrediente{{ $ingrediente->id }}">
                    <label class="form-check-label" for="ingrediente{{ $ingrediente->id }}">
                        {{ $ingrediente->nombre }}
                    </label>
                </div>
            @endforeach
        </div>

        <!-- Pizzas Dinámicas -->
        <div class="mb-3">
            <h3>Pizzas</h3>
            <div id="pizza-items">
                <!-- Aquí se agregarán dinámicamente las pizzas seleccionadas -->
            </div>
            <button type="button" class="btn btn-secondary" id="add-pizza">Agregar Pizza</button>
        </div>

        <!-- Botón Final -->
        <button type="submit" class="btn btn-primary">Realizar Pedido</button>
    </form>
</div>

<!-- Modal para agregar pizza -->
<div class="modal fade" id="pizzaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seleccionar Pizza</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Aquí podrías agregar campos como nombre, tamaño, ingredientes de la pizza, etc. -->
                <div class="mb-3">
                    <label>Tamaño</label>
                    <select class="form-select" id="pizza-size">
                        <option value="personal">Personal</option>
                        <option value="mediana">Mediana</option>
                        <option value="familiar">Familiar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Comentarios</label>
                    <textarea id="pizza-comment" class="form-control" placeholder="Sin cebolla, extra queso..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="save-pizza">Guardar Pizza</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    // Mostrar/ocultar campos de delivery
    document.querySelector('select[name="type"]').addEventListener('change', function() {
        const deliveryInfo = document.getElementById('delivery-info');
        deliveryInfo.style.display = this.value === 'delivery' ? 'block' : 'none';
    });

    // Agregar pizza
    let pizzaCount = 0;
    document.getElementById('add-pizza').addEventListener('click', function() {
        $('#pizzaModal').modal('show');
    });

    document.getElementById('save-pizza').addEventListener('click', function () {
        const size = document.getElementById('pizza-size').value;
        const comment = document.getElementById('pizza-comment').value;

        const container = document.getElementById('pizza-items');

        const html = `
            <div class="card mb-2">
                <div class="card-body">
                    <strong>Pizza ${pizzaCount + 1}:</strong><br>
                    Tamaño: ${size}<br>
                    Comentario: ${comment}
                    <input type="hidden" name="pizzas[${pizzaCount}][size]" value="${size}">
                    <input type="hidden" name="pizzas[${pizzaCount}][comment]" value="${comment}">
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
        pizzaCount++;

        // Cerrar modal
        $('#pizzaModal').modal('hide');
        document.getElementById('pizza-comment').value = '';
    });
</script>
@endsection
