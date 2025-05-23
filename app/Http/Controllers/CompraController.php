<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\MateriaPrima;
use Illuminate\Support\Facades\DB;
class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = DB::table('purchases')
        ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
        ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
        ->select('purchases.*', 'suppliers.name as supplier_name', 'raw_materials.name as material_name', 'raw_materials.unit')
        ->get();

        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = DB::table('suppliers')->orderBy('name')->get();
        $materiasPrimas = DB::table('raw_materials')->orderBy('name')->get();

        return view('compras.new', ['proveedores' => $proveedores, 'materiasPrimas' => $materiasPrimas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compra = new Compra();
        $compra->supplier_id = $request->supplier_id;
        $compra->raw_material_id = $request->raw_material_id;
        $compra->quantity = $request->quantity;
        $compra->purchase_price = $request->purchase_price;
        $compra->purchase_date = now();
        $compra->save();

        $compras = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select('purchases.*', 'suppliers.name as supplier_name', 'raw_materials.name as material_name', 'raw_materials.unit')
            ->get();

        return view('compras.index', ['compras' => $compras]);
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
        $compra = Compra::find($id);
        $proveedores = DB::table('suppliers')->orderBy('name')->get();
        $materiasPrimas = DB::table('raw_materials')->orderBy('name')->get();

        return view('compras.edit', ['compra' => $compra,'proveedores' => $proveedores,'materiasPrimas' => $materiasPrimas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $compra = Compra::find($id);
        $compra->supplier_id = $request->supplier_id;
        $compra->raw_material_id = $request->raw_material_id;
        $compra->quantity = $request->quantity;
        $compra->purchase_price = $request->purchase_price;
        $compra->save();
        $compras = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select('purchases.*', 'suppliers.name as supplier_name', 'raw_materials.name as material_name', 'raw_materials.unit')
            ->get();

        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compra = Compra::find($id);
        $compra->delete();
    
        $compras = DB::table('purchases')
            ->join('suppliers', 'purchases.supplier_id', '=', 'suppliers.id')
            ->join('raw_materials', 'purchases.raw_material_id', '=', 'raw_materials.id')
            ->select('purchases.*', 'suppliers.name as supplier_name', 'raw_materials.name as material_name', 'raw_materials.unit')
            ->get();
    
        return view('compras.index', ['compras' => $compras]);
    }
}
