<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaSize;
use Illuminate\Support\Facades\DB;
use App\Models\Pizza;

class PizzaSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzaSizes = PizzaSize::all();
        return view('pizzasizes.index', ['pizzaSizes' => $pizzaSizes]);

    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
        {
            $pizzas = Pizza::select('id', 'name')->get();

            return view('pizzasizes.new', compact('pizzas'));
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pizzaSizes = new PizzaSize();
        $pizzaSizes->size = $request->input('size');
        $pizzaSizes->price = $request->input('price');
        $pizzaSizes->pizza_id = $request->input('pizza_id');
        $pizzaSizes->save();

        return redirect()->route('pizzasizes.index');

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
