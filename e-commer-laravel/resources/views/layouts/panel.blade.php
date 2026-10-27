<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel') | {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .font-display { font-family: 'Playfair Display', Georgia, serif; }
        summary::-webkit-details-marker { display: none; }
        a:focus-visible, button:focus-visible, summary:focus-visible { outline: 2px solid #27533E; outline-offset: 3px; }
    </style>
</head>
<body class="bg-[#F9F8F4] text-[#2B2B2B] antialiased">

@php
    $usuario = auth()->user();

    // Menú según el rol. Solo se muestran los enlaces cuya ruta existe.
    $menu = match ($usuario->rol) {
        'administrador' => ['administrador.dashboard' => 'Usuarios'],
        'gerente' => ['gerente.dashboard' => 'Inicio'],
        default => ['cliente.dashboard' => 'Inicio', 'cliente.catalogo' => 'Catálogo'],
    };
    $etiquetaRol = ucfirst($usuario->rol);
@endphp

    <header class="sticky top-0 z-30 border-b border-[#2B2B2B]/10 bg-[#F9F8F4]/90 backdrop-blur">
        <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-full border border-[#27533E] text-[#27533E]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 19c0-8 5-14 14-14 0 9-6 14-14 14z"/><path d="M5 19c3-4 6-6 9-8"/></svg>
                </span>
                <span class="font-display text-xl font-semibold text-[#27533E]">{{ config('app.name') }}</span>
            </a>

            <nav class="flex items-center gap-8 text-sm font-medium">
                @foreach ($menu as $ruta => $texto)
                    @if (Route::has($ruta))
                        <a href="{{ route($ruta) }}" class="pb-1 {{ request()->routeIs($ruta) ? 'border-b-2 border-[#27533E] text-[#27533E]' : 'hover:text-[#27533E]' }}">{{ $texto }}</a>
                    @endif
                @endforeach
                <a href="{{ route('inicio') }}" class="pb-1 hover:text-[#27533E]">Ver tienda</a>
            </nav>

            <details class="relative">
                <summary class="flex cursor-pointer list-none items-center gap-3 rounded-full border border-[#2B2B2B]/15 bg-white py-1.5 pl-1.5 pr-4 text-sm">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#E8CEC8] font-semibold text-[#27533E]">{{ strtoupper(substr($usuario->nombre, 0, 1)) }}</span>
                    <span class="hidden sm:block">{{ $usuario->nombre }}</span>
                </summary>
                <div class="absolute right-0 mt-3 w-56 rounded-2xl bg-white p-2 shadow-[0_20px_50px_rgba(43,43,43,0.12)]">
                    <div class="border-b border-[#2B2B2B]/10 px-3 py-2">
                        <p class="text-sm font-medium">{{ $usuario->nombre }} {{ $usuario->apellidos }}</p>
                        <p class="text-xs text-[#2B2B2B]/60">{{ $etiquetaRol }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-2 rounded-xl px-3 py-2 text-left text-sm hover:bg-[#F9F8F4]">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 4H5v16h4"/><path d="M16 8l4 4-4 4"/><path d="M20 12H9"/></svg>
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </details>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-6 pt-10">
        @if (session('status'))
            <p class="mb-6 rounded-2xl bg-[#27533E]/10 px-5 py-3 text-sm text-[#27533E]">{{ session('status') }}</p>
        @endif

        @if (session('success'))
            <p class="mb-6 rounded-2xl bg-[#27533E]/10 px-5 py-3 text-sm text-[#27533E]">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p class="mb-6 rounded-2xl bg-[#E8CEC8] px-5 py-3 text-sm text-[#7A3B2E]">{{ session('error') }}</p>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-2xl bg-[#E8CEC8] px-5 py-4 text-sm text-[#7A3B2E]">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-24 border-t border-[#2B2B2B]/10">
        <div class="mx-auto max-w-7xl px-6 py-8 text-sm text-[#2B2B2B]/70">
            {{ config('app.name') }}. Sesión iniciada como {{ $usuario->rol }}.
        </div>
    </footer>
</body>
</html>
