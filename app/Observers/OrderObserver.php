<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\RawMaterial;

class OrderObserver
{
    public function updated(Order $order)
    {
        // Cuando un pedido se marca como entregado, actualizar inventario
        if ($order->isDirty('status') && $order->status === 'delivered') {
            foreach ($order->items as $item) {
                // Deduce las materias primas usadas para cada pizza
                foreach ($item->pizza->rawMaterials as $rawMaterial) {
                    RawMaterial::where('id', $rawMaterial->id)
                        ->decrement('quantity', $rawMaterial->pivot->quantity * $item->quantity);
                }
                
                // Deduce ingredientes extras
                foreach ($item->extraIngredients as $extra) {
                    $extra->ingredient->rawMaterials()->decrement(
                        'quantity', 
                        $extra->ingredient->quantity_per_unit * $extra->quantity
                    );
                }
            }
        }
    }
}
