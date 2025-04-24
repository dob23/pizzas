<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"
                style="background: linear-gradient(135deg, #d62828 50%, #4caf50 50%);
                            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"
                style="background: linear-gradient(135deg, #d62828 50%, #4caf50 50%);
                            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white sm:rounded-lg"
                    style="background: linear-gradient(135deg, #d62828 50%, #4caf50 50%);
                            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
