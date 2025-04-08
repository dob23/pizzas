<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:cocinero');
    }

    public function index()
    {
        $orders = Order::where('status', 'pending')
            ->orWhere('status', 'preparing')
            ->with('items.pizza', 'items.size', 'items.extraIngredients.ingredient')
            ->orderBy('created_at')
            ->get();
            
        return view('cook.index', compact('orders'));
    }

    public function updateStatus(Order $order, Request $request)
    {
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Estado actualizado');
    }
}
