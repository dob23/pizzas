<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', ['proveedores' => $proveedores,]);
    }

    /**
     * @return \\Illuminate\\Http\\Response
     */
    public function create()
    {
        $proveedores = DB::table('suppliers')
        ->select('id', 'name', 'contact_info') 
        ->get();
        return view('proveedores.new', ['proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $proveedores = new Proveedor();
        $proveedores->name = $request->input('name');
        $proveedores->contact_info = $request->input('contact_info');
        $proveedores->save();
        return redirect()->route('proveedores.index');
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
        $proveedores = Proveedor::findOrFail($id);
        return view('proveedores.edit', ['proveedores' => $proveedores]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->name = $request->input('name');
        $proveedores->contact_info = $request->input('contact_info');
        $proveedores->save();
        return redirect()->route('proveedores.index');
    }

    /**
     * @param int $id
     * @return \\Illuminate\\Http\\Response
     */
    public function destroy(string $id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $proveedores->delete();
        return redirect()->route('proveedores.index');
    }
}
