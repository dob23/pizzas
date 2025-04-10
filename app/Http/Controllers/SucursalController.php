<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use Illuminate\Support\Facades\DB;
class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sucursales = Sucursal::all();

        return view('sucursales.index', ['sucursales' => $sucursales,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sucursales = DB::table('branches')
        ->select('id', 'name', 'address')
        ->get();

        return view('sucursales.new', ['sucursales' => $sucursales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sucursal = new Sucursal();
        $sucursal->name = $request->input('name');
        $sucursal->address = $request->input('address');
        $sucursal->phone = $request->input('phone');
        $sucursal->email = $request->input('email');
        $sucursal->manager_id = $request->input('manager_id');
        $sucursal->save();

        return redirect()->route('sucursales.index');
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
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursales.edit', ['sucursal' => $sucursal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->name = $request->input('name');
        $sucursal->address = $request->input('address');
        $sucursal->phone = $request->input('phone');
        $sucursal->email = $request->input('email');
        $sucursal->manager_id = $request->input('manager_id');
        $sucursal->save();
    
        return redirect()->route('sucursales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
