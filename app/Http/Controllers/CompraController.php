<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
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
        ->select('purchases.*', 'suppliers.name as supplier_name', 'raw_materials.name as material_name','raw_materials.unit')
        ->get();

        return view('compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
