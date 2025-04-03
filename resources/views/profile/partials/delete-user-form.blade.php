<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Borrar Cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminarla, descargue cualquier dato o información que desee conservar.') }}
        </p>
    </header>

    <x-danger-button class="bg-green-600 hover:bg-green-700"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Borrar Cuenta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="w-full sm:max rounded-lg overflow-hidden shadow-lg"
            style="background: linear-gradient(135deg, #d62828 50%, #4caf50 50%);
                   box-shadow: 4px 4px 10px rgba(0,0,0,0.2);
                   padding: 0;">
    
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6 text-white">
                @csrf
                @method('delete')
    
                <h2 class="text-lg font-medium">
                    {{ __('¿Estás segur@ de que quieres eliminar tu cuenta?') }}
                </h2>
    
                <p class="mt-1 text-sm">
                    {{ __('Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar su cuenta permanentemente.') }}
                </p>
    
                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Contraseña') }}" class="sr-only" />
    
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4 text-gray-900"
                        placeholder="{{ __('Contraseña') }}"
                    />
    
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>
    
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')" class="bg-gray-700 hover:bg-gray-800 text-white">
                        {{ __('Cancelar') }}
                    </x-secondary-button>
    
                    <x-danger-button class="ms-3 bg-red-700 hover:bg-red-800">
                        {{ __('Borrar Cuenta') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
