<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use App\Models\PizzaSize;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $pizzas = Pizza::with('sizes', 'ingredients')->get();
        $extraIngredients = Ingredient::all();
        
        return view('orders.create', compact('pizzas', 'extraIngredients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:delivery,pickup,in_store',
            'items' => 'required|array|min:1',
            'items.*.pizza_id' => 'required|exists:pizzas,id',
            'items.*.size_id' => 'required|exists:pizza_sizes,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.extras' => 'sometimes|array',
            'items.*.extras.*.ingredient_id' => 'required|exists:ingredients,id',
            'items.*.extras.*.quantity' => 'required|integer|min:1',
            'address' => 'required_if:type,delivery',
            'phone' => 'required_if:type,delivery',
        ]);

        // Calcular total y crear orden
        $order = $this->createOrder($validated);

        return redirect()->route('orders.show', $order)->with('success', 'Pedido realizado con éxito');
    }

    protected function createOrder(array $data)
    {
        // Lógica para calcular total y crear la orden
        // ...
    }
}