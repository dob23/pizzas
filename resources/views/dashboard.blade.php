<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    {{ __("🍕Bienvenido 👋🏻 "). Auth::user()->name }}
                </div>

                <!-- Imagen -->
                <div class="p-6 flex justify-center">
                    <img src="{{ asset('images/Familia pizza.jpg') }}" alt="Familia pizza" class="rounded-lg shadow-md max-w-full h-auto">
                </div>

                <!-- Footer personalizado -->
                <div class="text-center text-sm text-gray-500 py-6">
                    © 2025 Pizzería El Buen Sabor. Todos los derechos reservados.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
