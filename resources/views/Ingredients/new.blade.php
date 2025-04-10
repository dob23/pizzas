@extends('layouts.app')

@section('content')
    <h1>Nuevo Ingrediente</h1>

    <form action="{{ route('ingredientes.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <button type="submit">Guardar</button>
    </form>
@endsection
