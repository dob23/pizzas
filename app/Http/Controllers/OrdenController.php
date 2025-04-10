<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden;
use App\Models\Cliente;
use App\Models\Sucursal;
use App\Models\Empleado;
class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = Orden::all();
        return view('ordenes.index', ['ordenes' => $ordenes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::with('user')->get();
        $sucursales = Sucursal::all();
        $repartidores = Empleado::all();
    
        return view('ordenes.new', compact('clientes', 'sucursales', 'repartidores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orden = new Orden();
        $orden->client_id = $request->input('client_id');
        $orden->branch_id = $request->input('branch_id');
        $orden->total_price = $request->input('total_price');
        $orden->status = $request->input('status');
        $orden->delivery_type = $request->input('delivery_type');
        $orden->delivery_person_id = $request->input('delivery_person_id');
        $orden->save();
    
        return redirect()->route('ordenes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orden = Orden::findOrFail($id);
        $clientes = Cliente::with('user')->get();
        $sucursales = Sucursal::all();
        $repartidores = Empleado::all();
    
        return view('ordenes.edit', compact('orden', 'clientes', 'sucursales', 'repartidores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orden = Orden::findOrFail($id);

        $orden->update([
            'client_id' => $request->client_id,
            'branch_id' => $request->branch_id,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'delivery_type' => $request->delivery_type,
            'delivery_person_id' => $request->delivery_person_id,
        ]);
    
        return redirect()->route('ordenes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
