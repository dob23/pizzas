<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esta es una zona segura de la aplicación. Confirme su contraseña antes de continuar.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full text-black bg-white"
                            type="password"
                            name="password"
                            required autocomplete="Contraseña actual" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirmar Contraseña') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
