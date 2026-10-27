@extends('layouts.panel')
@section('title', 'Inicio')

@section('content')
<div class="space-y-12 pb-10">
    <section class="relative isolate overflow-hidden rounded-[2.5rem] bg-white px-7 py-10 shadow-[0_10px_40px_rgba(43,43,43,0.06)] sm:px-10 sm:py-14">
        <svg class="pointer-events-none absolute -right-10 -top-16 -z-10 h-80 w-80 text-[#E8CEC8] sm:right-8 sm:top-1/2 sm:h-[26rem] sm:w-[26rem] sm:-translate-y-1/2" viewBox="0 0 240 240" aria-hidden="true">
            <path fill="currentColor" d="M193.8 41.6c23.8 20.4 39.5 56.2 32.3 86.4-7.1 30.2-37.1 54.9-69 72.6-31.8 17.7-65.5 28.5-93.3 16.1-27.8-12.5-49.7-48.2-49.5-83.2.2-35 22.5-69.4 53.3-91.4 30.8-22.1 70-31.8 101.7-24.6 9 2.1 17.3 10.4 24.5 14.1z"/>
        </svg>

        <div class="relative z-10 max-w-2xl">
            <p class="text-sm font-medium uppercase tracking-[0.18em] text-[#7A3B2E]">Tu espacio personal</p>
            <h1 class="mt-3 font-display text-4xl font-semibold leading-tight text-[#27533E] sm:text-5xl lg:text-6xl">
                Hola, {{ auth()->user()->nombre }}
            </h1>
            <p class="mt-5 max-w-xl text-base leading-7 text-[#2B2B2B]/75 sm:text-lg">
                Qué bueno tenerte de vuelta. Aquí puedes ver los productos disponibles.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                @if (Route::has('cliente.catalogo'))
                    <a href="{{ route('cliente.catalogo') }}" class="rounded-full bg-[#27533E] px-6 py-3 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.20)] transition hover:bg-[#1f4332]">Ver catálogo</a>
                @endif
                @if (Route::has('inicio'))
                    <a href="{{ route('inicio') }}" class="rounded-full border border-[#27533E] px-6 py-3 text-sm font-medium text-[#27533E] transition hover:bg-[#27533E]/5">Ver tienda</a>
                @endif
            </div>
        </div>
    </section>

    <section aria-labelledby="cuenta-titulo" class="rounded-[2rem] bg-white p-7 shadow-[0_10px_40px_rgba(43,43,43,0.06)] sm:p-9">
        <h2 id="cuenta-titulo" class="font-display text-2xl font-semibold text-[#27533E]">Tu cuenta</h2>
        <div class="mt-6 flex flex-col gap-5 border-t border-[#2B2B2B]/10 pt-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-lg font-semibold">{{ auth()->user()->nombre }} {{ auth()->user()->apellidos }}</p>
                <p class="mt-1 text-sm text-[#2B2B2B]/65">{{ auth()->user()->correo }}</p>
            </div>
            <span class="inline-flex w-fit rounded-full bg-[#E8CEC8] px-4 py-2 text-sm font-medium text-[#7A3B2E]">{{ ucfirst(auth()->user()->rol) }}</span>
        </div>
    </section>

    <section aria-labelledby="accesos-titulo">
        <div>
            <h2 id="accesos-titulo" class="font-display text-2xl font-semibold text-[#27533E]">Accesos rápidos</h2>
            <p class="mt-2 text-sm text-[#2B2B2B]/65">Encuentra lo que necesitas en un solo lugar.</p>
        </div>

        <div class="mt-7 flex flex-wrap gap-x-8 gap-y-7 sm:gap-x-12">
            @if (Route::has('cliente.catalogo'))
                <a href="{{ route('cliente.catalogo') }}" class="group flex w-24 flex-col items-center text-center">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E] transition group-hover:bg-[#27533E] group-hover:text-white">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16l-1.2 13H5.2L4 7z"/><path d="M8 9V6a4 4 0 018 0v3"/><path d="M9 11v.01M15 11v.01"/></svg>
                    </span>
                    <span class="mt-3 text-sm font-medium">Catálogo</span>
                </a>
            @else
                <div class="flex w-24 flex-col items-center text-center opacity-50">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E]">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16l-1.2 13H5.2L4 7z"/><path d="M8 9V6a4 4 0 018 0v3"/></svg>
                    </span>
                    <span class="mt-3 text-sm font-medium">Catálogo</span>
                    <span class="mt-1 text-xs">Próximamente</span>
                </div>
            @endif

            @if (Route::has('cliente.compras'))
                <a href="{{ route('cliente.compras') }}" class="group flex w-24 flex-col items-center text-center">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E] transition group-hover:bg-[#27533E] group-hover:text-white">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5h2l2 11h10l2-8H7"/><circle cx="10" cy="20" r="1"/><circle cx="17" cy="20" r="1"/><path d="M10 9h7M13.5 5.5v7"/></svg>
                    </span>
                    <span class="mt-3 text-sm font-medium">Mis compras</span>
                </a>
            @else
                <div class="flex w-24 flex-col items-center text-center opacity-50">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E]">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 5h2l2 11h10l2-8H7"/><circle cx="10" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
                    </span>
                    <span class="mt-3 text-sm font-medium">Mis compras</span>
                    <span class="mt-1 text-xs">Próximamente</span>
                </div>
            @endif

            @if (Route::has('inicio'))
                <a href="{{ route('inicio') }}" class="group flex w-24 flex-col items-center text-center">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E] transition group-hover:bg-[#27533E] group-hover:text-white">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10l9-7 9 7"/><path d="M5 9v11h14V9M9 20v-6h6v6"/><path d="M8 10h.01M16 10h.01"/></svg>
                    </span>
                    <span class="mt-3 text-sm font-medium">Tienda</span>
                </a>
            @else
                <div class="flex w-24 flex-col items-center text-center opacity-50">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E]">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 10l9-7 9 7"/><path d="M5 9v11h14V9M9 20v-6h6v6"/></svg>
                    </span>
                    <span class="mt-3 text-sm font-medium">Tienda</span>
                    <span class="mt-1 text-xs">Próximamente</span>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
