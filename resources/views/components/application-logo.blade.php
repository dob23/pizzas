@php
    $isSmallLogo = 
    request()->routeIs('dashboard') || 
    request()->routeIs('profile.edit') || 
    request()->routeIs('proveedores.index');
@endphp

<img src="{{ asset('images/logo2.png') }}" alt="pizza_logo" 
    class="{{ $isSmallLogo ? 'w-20 h-auto' : 'w-full max-w-[316px] h-auto' }}">