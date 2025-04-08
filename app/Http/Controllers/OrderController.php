<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // ... otros métodos ...

    public function store(Request $request)
    {
        // 1. Validación de datos
        $validated = $request->validate([
            // tus reglas de validación aquí...
        ]);
        
        // 2. Creación del pedido
        $order = $this->createOrder($validated);
        
        // 3. Notificar a los cocineros (esto es lo que preguntas)
        $this->notifyCooks($order);
        
        // 4. Redireccionar con mensaje de éxito
        return redirect()->route('orders.show', $order)
               ->with('success', 'Pedido realizado con éxito');
    }
    
    protected function createOrder(array $data)
    {
        // Lógica para crear el pedido...
        $order = Order::create([
            // datos del pedido...
        ]);
        
        // Crear items del pedido...
        
        return $order;
    }
    
    protected function notifyCooks(Order $order)
    {
        // Obtener todos los cocineros de la misma sucursal
        $cooks = User::role('cocinero')
            ->whereHas('employee', function($q) use ($order) {
                $q->where('branch_id', $order->branch_id);
            })->get();
        
        // Notificar a cada cocinero
        foreach ($cooks as $cook) {
            $cook->notify(new NewOrderNotification($order));
        }
    }

    public function index()
{
    $orders = Order::with(['client.user', 'branch'])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                
    return view('orders.index', compact('orders'));
}

}