<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaPrima; 
use Illuminate\Support\Facades\DB;
class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiaPrimas = MateriaPrima::all();
        return view('materiaprimas.index', ['materiaPrima' => $materiaPrimas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materiaPrimas = DB::table('raw_materials')
        ->select('id', 'name', 'unit', 'current_stock')
        ->get();
        return view('materiaprimas.new', ['materiaPrima' => $materiaPrimas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $materiaPrimas = new MateriaPrima();
        $materiaPrimas->name = $request->input('name');
        $materiaPrimas->unit = $request->input('unit');
        $materiaPrimas->current_stock = $request->input('current_stock');
        $materiaPrimas->save();
        return redirect()->route('materiaPrima.index');
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
        $materiaPrimas = MateriaPrima::findOrFail($id);
        return view('materiaprimas.edit', ['materiaPrima' => $materiaPrimas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materiaPrimas = MateriaPrima::findOrFail($id);
        $materiaPrimas->name = $request->input('name');
        $materiaPrimas->unit = $request->input('unit');
        $materiaPrimas->current_stock = $request->input('current_stock');
        $materiaPrimas->save();
        return redirect()->route('materiaPrima.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materiaPrimas = MateriaPrima::findOrFail($id);
        $materiaPrimas->delete();
        return redirect()->route('materiaPrima.index');
    }
}
