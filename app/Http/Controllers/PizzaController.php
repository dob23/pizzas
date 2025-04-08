<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use Illuminate\Support\Facades\DB;


class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pizzas = DB::table('pizzas')
        ->select('id', 'name')
        ->get();
        return view('pizzas.new', ['pizzas' => $pizzas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizzas = new Pizza();
        $pizzas->name = $request->input('name');
        $pizzas->save();
        
        return view('pizzas.index', ['pizzas' => $pizzas]);

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
