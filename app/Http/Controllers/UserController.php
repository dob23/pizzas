<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role = $request->role;
        $usuario->password = bcrypt($request->password); // Siempre cifrar la contraseña
        $usuario->save();
    
        return redirect()->route('usuarios.index');
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
    public function edit($id)
    {
        $usuarios = User::findOrFail($id);
        return view('usuarios.edit', ['usuario' => $usuarios]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {    
        $usuarios = User::findOrFail($id);
        $usuarios->name = $request->input('name');
        $usuarios->email = $request->input('email');
        $usuarios->role = $request->input('role');
        $usuarios->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }

    public function actualizarRol(Request $request, $id)
    {
        $usuarios = User::findOrFail($id);
        $usuarios->role = $request->role;
        $usuarios->save();

        return response()->json(['success' => true]);
    }
}
