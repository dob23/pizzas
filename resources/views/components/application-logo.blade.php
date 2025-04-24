@php
    $smallLogoRoutes = [
        'dashboard',
        'profile.edit',
        'proveedores.index',
        'proveedores.new',
        'proveedores.edit',
        'materiaPrima.index',
        'materiaPrima.new',
        'materiaPrima.edit',
        'compras.index',
        'compras.new',
        'compras.edit',
        'usuarios.index',
        'usuarios.edit',
        'pizzas.index',
        'pizzas.new',
        'pizzas.edit',
        'pizzasizes.index',
        'pizzasizes.new',
        'pizzasizes.edit',
        'empleados.index',
        'empleados.new',
        'empleados.edit',
        'clientes.index',
        'clientes.new',
        'clientes.edit',
        'sucursales.index',
        'sucursales.new',
        'sucursales.edit',
    ];
    $isSmallLogo = request()->routeIs(...$smallLogoRoutes);
@endphp

<img src="{{ asset('images/logo2.png') }}" alt="pizza_logo" 
    class="{{ $isSmallLogo ? 'w-20 h-auto' : 'w-full max-w-[316px] h-auto' }}">