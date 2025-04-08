<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Ingrediente;
use App\Models\OrderExtraIngredient;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['client.user', 'branch'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
                    
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $ingredientes = Ingrediente::all();
        return view('orders.create', compact('ingredientes'));
    }

    public function store(Request $request)
    {
        // 1. Validación
        $validated = $request->validate([
            'direccion' => 'required|string|max:255',
            'ingredientes' => 'array',
        ]);

        // 2. Crear pedido
        $order = $this->createOrder($validated);

        // 3. Notificar a cocineros
        $this->notifyCooks($order);

    }

    protected function createOrder(array $data)
    {
        // Crear el pedido
        $order = Order::create([
            'usuario_id' => auth()->id(),
            'direccion' => $data['direccion'],
            'estado' => 'pendiente',
            'fecha_hora' => now(),
            'branch_id' => auth()->user()->employee->branch_id ?? null, // depende del modelo
        ]);

        // Ingredientes extra
        if (!empty($data['ingredientes'])) {
            foreach ($data['ingredientes'] as $ingredienteId) {
                OrderExtraIngredient::create([
                    'order_id' => $order->id,
                    'ingrediente_id' => $ingredienteId,
                ]);
            }
        }

        return $order;
    }

    protected function notifyCooks(Order $order)
    {
        $cooks = User::role('cocinero')
            ->whereHas('employee', function($q) use ($order) {
                $q->where('branch_id', $order->branch_id);
            })->get();

        foreach ($cooks as $cook) {
            $cook->notify(new NewOrderNotification($order));
        }
    }
}