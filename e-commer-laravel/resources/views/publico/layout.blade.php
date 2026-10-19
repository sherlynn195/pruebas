<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inicio') | {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
        a:focus-visible { outline: 2px solid #27533E; outline-offset: 3px; }
    </style>
</head>
<body class="bg-[#F9F8F4] text-[#2B2B2B] antialiased">

@php
    $links = [
        'inicio' => 'Inicio',
        'quienes-somos' => 'Quiénes somos',
        'mision-vision' => 'Misión y visión',
        'ubicacion' => 'Ubicación',
        'contactanos' => 'Contáctanos',
    ];
@endphp

    <header class="sticky top-0 z-30 border-b border-[#2B2B2B]/10 bg-[#F9F8F4]/90 backdrop-blur">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6">
            <a href="{{ route('inicio') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full border border-[#27533E] text-[#27533E]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19c0-8 5-14 14-14 0 9-6 14-14 14z"/><path d="M5 19c3-4 6-6 9-8"/></svg>
                </span>
                <span class="font-display text-xl font-semibold text-[#27533E]">{{ config('app.name') }}</span>
            </a>

            <nav class="hidden items-center gap-8 text-sm font-medium lg:flex">
                @foreach ($links as $ruta => $texto)
                    <a href="{{ route($ruta) }}" class="pb-1 {{ request()->routeIs($ruta) ? 'border-b-2 border-[#27533E] text-[#27533E]' : 'hover:text-[#27533E]' }}">{{ $texto }}</a>
                @endforeach
            </nav>

            <div class="flex items-center gap-3 text-sm font-medium">
                @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-full bg-[#27533E] px-6 py-2.5 text-white hover:bg-[#1f4332]">Ir a mi panel</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-full border border-[#27533E] px-6 py-2.5 text-[#27533E] hover:bg-[#27533E]/5">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="rounded-full bg-[#27533E] px-6 py-2.5 text-white hover:bg-[#1f4332]">Registrarse</a>
                @endauth
            </div>
        </div>

        {{-- Menú para pantallas pequeñas --}}
        <nav class="flex gap-6 overflow-x-auto border-t border-[#2B2B2B]/10 px-6 py-3 text-sm font-medium lg:hidden">
            @foreach ($links as $ruta => $texto)
                <a href="{{ route($ruta) }}" class="whitespace-nowrap {{ request()->routeIs($ruta) ? 'text-[#27533E] underline underline-offset-8' : '' }}">{{ $texto }}</a>
            @endforeach
        </nav>
    </header>

    <main>@yield('content')</main>

    <footer class="mt-24 border-t border-[#2B2B2B]/10">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-12 text-sm md:grid-cols-3">
            <div>
                <p class="font-display text-xl font-semibold text-[#27533E]">{{ config('app.name') }}</p>
                <p class="mt-3 max-w-xs leading-relaxed text-[#2B2B2B]/70">Moda cómoda y bien hecha para el día a día.</p>
            </div>
            <ul class="space-y-2">
                @foreach ($links as $ruta => $texto)
                    <li><a href="{{ route($ruta) }}" class="hover:text-[#27533E]">{{ $texto }}</a></li>
                @endforeach
            </ul>
            <div class="space-y-2 text-[#2B2B2B]/70">
                <p>contacto@tutienda.com</p>
                <p>+52 961 000 0000</p>
                <p>Tuxtla Gutiérrez, Chiapas</p>
            </div>
        </div>
    </footer>
</body>
</html>