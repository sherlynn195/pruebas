@extends('publico.layout')

@section('title', 'Inicio')

@php
    // Contenido de ejemplo: cambia nombres, precios y textos por los de tu tienda.
    $categorias = [
        ['nombre' => 'Vestidos', 'icono' => '<path d="M9 3l3 3 3-3 1 6-2 3 3 9H7l3-9-2-3 1-6z"/>'],
        ['nombre' => 'Blusas', 'icono' => '<path d="M8 4l-5 4 3 4 2-1v9h8v-9l2 1 3-4-5-4a4 4 0 01-8 0z"/>'],
        ['nombre' => 'Accesorios', 'icono' => '<path d="M6 7h12l1 13H5L6 7z"/><path d="M9 7a3 3 0 016 0"/>'],
        ['nombre' => 'Ofertas', 'icono' => '<path d="M3 12V4h8l10 10-8 8L3 12z"/><circle cx="7.5" cy="8.5" r="1.2"/>'],
    ];
    $destacados = [
        ['nombre' => 'Vestido lino arena', 'precio' => '$899.00', 'fondo' => 'bg-[#E8CEC8]'],
        ['nombre' => 'Blusa algodón crema', 'precio' => '$459.00', 'fondo' => 'bg-[#DDE6DF]'],
        ['nombre' => 'Bolso de mano verde', 'precio' => '$1,150.00', 'fondo' => 'bg-[#EFE6DA]'],
    ];
@endphp

@section('content')
<div class="mx-auto max-w-7xl px-6">

    <section class="grid items-center gap-10 pt-12 lg:grid-cols-2">
        <div>
            <h1 class="font-display text-4xl font-semibold leading-tight text-[#27533E] sm:text-6xl">
                Moda que se siente como en casa
            </h1>
            <p class="mt-6 max-w-md text-lg leading-relaxed text-[#2B2B2B]/80">
                Prendas de telas suaves y colores tranquilos para que te vistas cómoda todos los días.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                @guest
                    <a href="{{ route('register') }}" class="rounded-full bg-[#27533E] px-8 py-3.5 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.25)] hover:bg-[#1f4332]">Crear mi cuenta</a>
                @else
                    <a href="{{ url('/dashboard') }}" class="rounded-full bg-[#27533E] px-8 py-3.5 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.25)] hover:bg-[#1f4332]">Ir a mi panel</a>
                @endguest
                <a href="{{ route('quienes-somos') }}" class="rounded-full border border-[#27533E] px-8 py-3.5 text-sm font-medium text-[#27533E] hover:bg-[#27533E]/5">Conocer la tienda</a>
            </div>
        </div>

        <div class="relative mx-auto h-96 w-full max-w-md">
            <svg class="absolute inset-0 h-full w-full" viewBox="0 0 200 200" aria-hidden="true">
                <path fill="#E8CEC8" transform="translate(100 100)" d="M44.7,-58.3C57.6,-48.6,67.6,-34.3,72.5,-18.1C77.4,-1.9,77.3,16.1,69.8,29.9C62.3,43.7,47.5,53.3,32.1,60.4C16.7,67.5,0.7,72.1,-15.5,70.1C-31.7,68.1,-48.1,59.5,-58.7,46.3C-69.3,33.1,-74.1,15.3,-72.4,-1C-70.7,-17.3,-62.5,-32,-51.3,-42.2C-40.1,-52.4,-25.9,-58.1,-10.4,-60.9C5.1,-63.7,31.8,-68,44.7,-58.3Z"/>
            </svg>
            <div class="absolute left-1/2 top-1/2 w-60 -translate-x-1/2 -translate-y-1/2 rounded-3xl bg-white p-5 shadow-[0_25px_60px_rgba(43,43,43,0.14)]">
                <div class="flex h-36 items-center justify-center rounded-2xl bg-[#F9F8F4] text-[#27533E]">
                    <svg class="h-14 w-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3l3 3 3-3 1 6-2 3 3 9H7l3-9-2-3 1-6z"/></svg>
                </div>
                <p class="mt-4 font-display text-lg font-semibold">Vestido lino arena</p>
                <p class="text-sm text-[#2B2B2B]/70">$899.00</p>
            </div>
            <span class="absolute right-4 top-6 flex h-20 w-20 items-center justify-center rounded-full bg-[#27533E] text-center font-display text-lg font-semibold leading-tight text-white shadow-[0_15px_35px_rgba(39,83,62,0.3)]">40%<br>menos</span>
        </div>
    </section>

    <section class="mt-24">
        <h2 class="font-display text-3xl font-semibold">Compra por categoría</h2>
        <div class="mt-8 flex flex-wrap gap-10">
            @foreach ($categorias as $c)
                <div class="flex w-28 flex-col items-center gap-3 text-center">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E]">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">{!! $c['icono'] !!}</svg>
                    </span>
                    <span class="text-sm font-medium">{{ $c['nombre'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-24">
        <h2 class="font-display text-3xl font-semibold">Los favoritos de la temporada</h2>
        <div class="mt-8 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($destacados as $p)
                <article>
                    <div class="flex h-72 items-center justify-center rounded-[2rem] {{ $p['fondo'] }} text-[#27533E]">
                        <svg class="h-16 w-16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M6 7h12l1 13H5L6 7z"/><path d="M9 7a3 3 0 016 0"/></svg>
                    </div>
                    <div class="mt-4 flex items-start justify-between gap-4">
                        <div>
                            <h3 class="font-display text-lg font-semibold">{{ $p['nombre'] }}</h3>
                            <p class="mt-1 text-sm text-[#2B2B2B]/70">{{ $p['precio'] }}</p>
                        </div>
                        <a href="{{ route('login') }}" class="rounded-full border border-[#27533E] px-4 py-2 text-xs font-medium text-[#27533E] hover:bg-[#27533E] hover:text-white">Inicia sesión para comprar</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-24 flex flex-col items-start justify-between gap-6 rounded-[2.5rem] bg-[#E8CEC8] p-10 sm:flex-row sm:items-center">
        <div>
            <h2 class="font-display text-3xl font-semibold text-[#27533E]">Crea tu cuenta y compra más rápido</h2>
            <p class="mt-2 max-w-lg text-[#2B2B2B]/80">Guarda tus datos y sigue tus pedidos desde un solo lugar.</p>
        </div>
        @guest
            <a href="{{ route('register') }}" class="rounded-full bg-[#27533E] px-8 py-3.5 text-sm font-medium text-white hover:bg-[#1f4332]">Registrarse</a>
        @endguest
    </section>
</div>
@endsection