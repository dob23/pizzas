<nav x-data="{ open: false }" class="bg-green-600 border-b border-green-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>

                {{-- Dashboard: todos los roles --}}
                <x-nav-link
                    :href="route('dashboard')"
                    :active="request()->routeIs('dashboard')"
                    class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                >
                    {{ __('Dashboard') }}
                </x-nav-link>

                {{-- Proveedores, Materia Prima, Compras: super_admin, administrador, gerente_sucursal, almacenista --}}
                @if(
                    Auth::user()->role === 'super_admin' ||
                    Auth::user()->role === 'administrador' ||
                    Auth::user()->role === 'gerente_sucursal' ||
                    Auth::user()->role === 'almacenista'
                )
                    <x-nav-link
                        :href="route('proveedores.index')"
                        :active="request()->routeIs('proveedores.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Proveedores') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('materiaPrima.index')"
                        :active="request()->routeIs('materiaPrima.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Materia Prima') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('compras.index')"
                        :active="request()->routeIs('compras.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Compras') }}
                    </x-nav-link>
                @endif

                {{-- Pizzas y Tamaño Pizza: super_admin, administrador, gerente_sucursal --}}
                @if(
                    Auth::user()->role === 'super_admin' ||
                    Auth::user()->role === 'administrador' ||
                    Auth::user()->role === 'gerente_sucursal'
                )
                    <x-nav-link
                        :href="route('pizzas.index')"
                        :active="request()->routeIs('pizzas.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Pizzas') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('pizzasizes.index')"
                        :active="request()->routeIs('pizzasizes.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Tamaño Pizza') }}
                    </x-nav-link>
                @endif

                {{-- Usuarios y Empleados: super_admin, administrador --}}
                @if(
                    Auth::user()->role === 'super_admin' ||
                    Auth::user()->role === 'administrador'
                )
                    <x-nav-link
                        :href="route('usuarios.index')"
                        :active="request()->routeIs('usuarios.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Usuarios') }}
                    </x-nav-link>
                    <x-nav-link
                        :href="route('empleados.index')"
                        :active="request()->routeIs('empleados.*')"
                        class="text-white inline-flex items-center px-3 py-2 border border-transparent hover:border-green-700 text-sm font-medium rounded-md bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150"
                    >
                        {{ __('Empleados') }}
                    </x-nav-link>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-green-600 hover:bg-green-100">
                            {{ __('Editar Perfil') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link
                                :href="route('logout')"
                                class="text-green-600 hover:bg-green-100"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-green-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{-- Dashboard siempre --}}
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            {{-- Mismos condicionales sin in_array --}}
            @if(
                Auth::user()->role === 'super_admin' ||
                Auth::user()->role === 'administrador' ||
                Auth::user()->role === 'gerente_sucursal' ||
                Auth::user()->role === 'almacenista'
            )
                <x-responsive-nav-link :href="route('proveedores.index')" :active="request()->routeIs('proveedores.*')" class="text-white">
                    {{ __('Proveedores') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('materiaPrima.index')" :active="request()->routeIs('materiaPrima.*')" class="text-white">
                    {{ __('Materia Prima') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('compras.index')" :active="request()->routeIs('compras.*')" class="text-white">
                    {{ __('Compras') }}
                </x-responsive-nav-link>
            @endif

            @if(
                Auth::user()->role === 'super_admin' ||
                Auth::user()->role === 'administrador' ||
                Auth::user()->role === 'gerente_sucursal'
            )
                <x-responsive-nav-link :href="route('pizzas.index')" :active="request()->routeIs('pizzas.*')" class="text-white">
                    {{ __('Pizzas') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('pizzasizes.index')" :active="request()->routeIs('pizzasizes.*')" class="text-white">
                    {{ __('Tamaño Pizza') }}
                </x-responsive-nav-link>
            @endif

            @if(
                Auth::user()->role === 'super_admin' ||
                Auth::user()->role === 'administrador'
            )
                <x-responsive-nav-link :href="route('usuarios.index')" :active="request()->routeIs('usuarios.*')" class="text-white">
                    {{ __('Usuarios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('empleados.index')" :active="request()->routeIs('empleados.*')" class="text-white">
                    {{ __('Empleados') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings -->
        <div class="pt-4 pb-1 border-t border-green-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                    {{ __('Editar Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link
                        :href="route('logout')"
                        class="text-white"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
