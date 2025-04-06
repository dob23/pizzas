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
    ];
    $isSmallLogo = request()->routeIs(...$smallLogoRoutes);
@endphp

<img src="{{ asset('images/logo2.png') }}" alt="pizza_logo" 
    class="{{ $isSmallLogo ? 'w-20 h-auto' : 'w-full max-w-[316px] h-auto' }}">