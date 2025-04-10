@extends('layouts.app')

@section('content')
    <h1>Ingredientes</h1>
    <a href="{{ route('ingredientes.new') }}">Nuevo Ingrediente</a>  <!-- Cambiado de ingredients.create a ingredientes.new -->

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($ingredients as $ingredient)
            <li>
                {{ $ingredient->name }}
                <a href="{{ route('ingredientes.edit', $ingredient) }}">Editar</a>  <!-- Cambiado de ingredients.edit a ingredientes.edit -->
                <form action="{{ route('ingredientes.destroy', $ingredient) }}" method="POST" style="display:inline;">  <!-- Cambiado de ingredients.destroy a ingredientes.destroy -->
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection