<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $empleados = Empleado::all();
      return view('empleados.index', ['empleados' => $empleados]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = DB::table('users')->select('id', 'name')->get();

        return view('empleados.new', [ 'usuarios' => $usuarios
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->user_id = $request->user_id;
        $empleado->position = $request->position;
        $empleado->identification_number = $request->identification_number;
        $empleado->salary = $request->salary;
        $empleado->hire_date = $request->hire_date;

        $empleado->save();

        return redirect()->route('empleados.index');
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
