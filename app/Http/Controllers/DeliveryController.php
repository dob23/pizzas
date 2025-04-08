<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:mensajero');
    }

    public function index()
    {
        $orders = Order::where('type', 'delivery')
            ->whereIn('status', ['ready', 'on_delivery'])
            ->with('client', 'branch')
            ->orderBy('created_at')
            ->get();
            
        return view('delivery.index', compact('orders'));
    }

    public function updateStatus(Order $order, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:on_delivery,delivered'
        ]);
        
        $order->update($validated);
        return back()->with('success', 'Estado actualizado');
    }
}