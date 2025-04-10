<!DOCTYPE html>  
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Pizzería El Buen Sabor</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Franja verde superior -->
    <div class="bg-green-600 h-4 w-full"></div>

    <!-- Header -->
   <header class="bg-red-600 text-white px-6 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-8">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo Pizzería" class="h-9 w-17" />
        <h1 class="text-2xl font-bold">Pizzería El Buen Sabor</h1>
    </div>

    @auth
    <a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a>
@else
<div class="flex items-center space-x-10">
    <a href="{{ route('login') }}" class="hover:underline">Iniciar Sesión</a>
    <span class="text-white"> |    | </span>
    <a href="{{ route('register') }}" class="hover:underline">Registrarse</a>
</div>
@endauth
   </header>

    <!-- Contenido Principal -->
    <main class="flex max-w-7xl mx-auto mt-6">

        <!-- Menú lateral izquierdo -->
        <aside class="w-48 px-4 py-2">
            <h2 class="text-lg font-semibold text-red-700 border-b pb-2">Pizzas</h2>
            <p class="mt-2 text-sm text-gray-600">Queso mozzarella 100% verdadero.</p>
        </aside>

        <!-- Galería de Pizzas -->
        <section class="flex-1 px-6">
            <div class="mb-4">
                <h3 class="text-blue-800 font-bold uppercase text-sm">Nuestras Recomendaciones</h3>
            </div>

            <div class="flex space-x-4 overflow-x-auto pb-2">

                <!-- Pizza 1 -->
                <div class="w-48 bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadows flex-shrink-0">
                    <div class="h-32 w-full overflow-hidden flex items-center justify-center bg-white">
                        <img src="{{ asset('images/Pizza de carne.jpeg') }}" alt="Pizza de Carne" class="object-cover max-h-full" />
                    </div>
                    <div class="p-2 text-center">
                        <p class="text-sm font-medium text-gray-800">Pizza de Carne</p>
                    </div>
                </div>

                <!-- Pizza 2 -->
                <div class="w-48 bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadows flex-shrink-0">
                    <div class="h-32 w-full overflow-hidden flex items-center justify-center bg-white">
                        <img src="{{ asset('images/Pizza de jamon.jpg') }}" alt="Pizza de Jamón" class="object-cover max-h-full" />
                    </div>
                    <div class="p-2 text-center">
                        <p class="text-sm font-medium text-gray-800">Pizza de Jamón</p>
                    </div>
                </div>

                <!-- Pizza 3 -->
                <div class="w-48 bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadows flex-shrink-0">
                    <div class="h-32 w-full overflow-hidden flex items-center justify-center bg-white">
                        <img src="{{ asset('images/Pizza de verduras.jpg') }}" alt="Pizza de Verduras" class="object-cover max-h-full" />
                    </div>
                    <div class="p-2 text-center">
                        <p class="text-sm font-medium text-gray-800">Pizza de Verduras</p>
                    </div>
                </div>

                <!-- Pizza 4 (Tomate) -->
                <div class="w-48 bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadows flex-shrink-0">
                    <div class="h-32 w-full overflow-hidden flex items-center justify-center bg-white">
                        <img src="{{ asset('images/Pizza tomate.jpg') }}" alt="Pizza de Tomate" class="object-cover max-h-full" />
                    </div>
                    <div class="p-2 text-center">
                        <p class="text-sm font-medium text-gray-800">Pizza de Tomate</p>
                    </div>
                </div>

                <!-- Pizza 5 -->
                <div class="w-48 bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadows flex-shrink-0">
                    <div class="h-32 w-full overflow-hidden flex items-center justify-center bg-white">
                        <img src="{{ asset('images/Pollo con champiñones.jpg') }}" alt="Pollo con Champiñones" class="object-cover max-h-full" />
                    </div>
                    <div class="p-2 text-center">
                        <p class="text-sm font-medium text-gray-800">Pollo con Champiñones</p>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="mt-10 py-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} Pizzería El Buen Sabor. Todos los derechos reservados.
    </footer>

</body>
</html>            