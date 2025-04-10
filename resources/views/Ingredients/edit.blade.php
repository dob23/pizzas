@extends('layouts.app')

@section('content')
    <h1>Editar Ingrediente</h1>

    <form action="{{ route('ingredientes.update', $ingredient) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nombre:</label>
        <input type="text" name="name" value="{{ $ingredient->name }}" required>
        <button type="submit">Actualizar</button>
    </form>
@endsection
