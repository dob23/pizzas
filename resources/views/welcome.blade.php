<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Pizzería El Buen Sabor</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fffdf7] text-[#1b1b18] min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-red-600 text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">Pizzería El Buen Sabor</h1>
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:underline">Iniciar Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:underline">Registrarse</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="flex-1 flex items-center justify-center px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-red-600 mb-4">¡Bienvenido a la mejor pizzería de la ciudad!</h2>
            <p class="text-lg text-green-700">Disfruta de nuestras pizzas artesanales hechas con los mejores ingredientes.</p>
            <div class="mt-6">
                <a href="{{ route('login') }}"
                   class="inline-block bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800 transition">
                   Ordenar Ahora
                </a>
            </div>
        </div>
    </main>

    <!-- Footer opcional -->
    <footer class="text-center py-4 text-sm text-gray-500">
        © {{ date('Y') }} Pizzería El Buen Sabor. Todos los derechos reservados.
    </footer>
</body>
</html>
