@extends('layouts.panel')

@section('title', 'Inicio')

@php
    // Datos de ejemplo. Cuando tengas pedidos y productos en la base de datos,
    // envíalos desde GerenteController (Gerente/DashboardController) con compact().
    $stats = [
        ['label' => 'Pedidos por preparar', 'value' => 12, 'icon' => 'clock'],
        ['label' => 'Productos con poco stock', 'value' => 5, 'icon' => 'alert'],
        ['label' => 'Mensajes de clientes', 'value' => 3, 'icon' => 'chat'],
        ['label' => 'Entregados esta semana', 'value' => 48, 'icon' => 'check'],
    ];
    $accesos = [
        ['label' => 'Pedidos', 'icon' => 'bag'],
        ['label' => 'Inventario', 'icon' => 'box'],
        ['label' => 'Productos', 'icon' => 'tag'],
        ['label' => 'Clientes', 'icon' => 'users'],
    ];
    $pedidos = [
        ['id' => '#1042', 'cliente' => 'María Gómez', 'total' => '$1,280.00', 'estado' => 'Pendiente'],
        ['id' => '#1041', 'cliente' => 'Luis Hernández', 'total' => '$640.50', 'estado' => 'Enviado'],
        ['id' => '#1040', 'cliente' => 'Ana Torres', 'total' => '$2,150.00', 'estado' => 'Entregado'],
        ['id' => '#1039', 'cliente' => 'Carlos Ruiz', 'total' => '$399.00', 'estado' => 'Entregado'],
    ];
    $estadoClase = [
        'Pendiente' => 'bg-[#E8CEC8] text-[#7A3B2E]',
        'Enviado' => 'bg-[#27533E]/10 text-[#27533E]',
        'Entregado' => 'bg-[#27533E] text-white',
    ];
    $icons = [
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'alert' => '<path d="M12 3l10 18H2L12 3z"/><path d="M12 10v5M12 18v.5"/>',
        'chat' => '<path d="M4 5h16v11H9l-5 4V5z"/>',
        'check' => '<circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-5"/>',
        'bag' => '<path d="M6 7h12l1 13H5L6 7z"/><path d="M9 7a3 3 0 016 0"/>',
        'box' => '<path d="M3 7l9-4 9 4-9 4-9-4z"/><path d="M3 7v10l9 4 9-4V7"/><path d="M12 11v10"/>',
        'tag' => '<path d="M3 12V4h8l10 10-8 8L3 12z"/><circle cx="7.5" cy="8.5" r="1.2"/>',
        'users' => '<circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c0-3.6 2.9-6 6.5-6s6.5 2.4 6.5 6"/><circle cx="17.5" cy="9" r="2.5"/><path d="M17.5 14c2.5 0 4 1.7 4 4.5"/>',
    ];
@endphp

@section('content')
<div class="mx-auto max-w-7xl px-6">

    {{-- Hero --}}
    <section class="grid items-center gap-10 pt-12 lg:grid-cols-2">
        <div>
            <h1 class="font-display text-4xl font-semibold leading-tight text-[#27533E] sm:text-5xl">
                Buen día, {{ auth()->user()->nombre }}
            </h1>
            <p class="mt-5 max-w-md text-lg leading-relaxed text-[#2B2B2B]/80">
                Tienes 12 pedidos por preparar y 5 productos que necesitan reposición.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="#" class="rounded-full bg-[#27533E] px-7 py-3 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.25)] hover:bg-[#1f4332]">Preparar pedidos</a>
                <a href="#" class="rounded-full border border-[#27533E] px-7 py-3 text-sm font-medium text-[#27533E] hover:bg-[#27533E]/5">Revisar inventario</a>
            </div>
        </div>

        <div class="relative mx-auto h-80 w-full max-w-md">
            <svg class="absolute inset-0 h-full w-full" viewBox="0 0 200 200" aria-hidden="true">
                <path fill="#E8CEC8" transform="translate(100 100)" d="M44.7,-58.3C57.6,-48.6,67.6,-34.3,72.5,-18.1C77.4,-1.9,77.3,16.1,69.8,29.9C62.3,43.7,47.5,53.3,32.1,60.4C16.7,67.5,0.7,72.1,-15.5,70.1C-31.7,68.1,-48.1,59.5,-58.7,46.3C-69.3,33.1,-74.1,15.3,-72.4,-1C-70.7,-17.3,-62.5,-32,-51.3,-42.2C-40.1,-52.4,-25.9,-58.1,-10.4,-60.9C5.1,-63.7,31.8,-68,44.7,-58.3Z"/>
            </svg>
            <div class="absolute left-1/2 top-1/2 w-64 -translate-x-1/2 -translate-y-1/2 rounded-3xl bg-white p-6 shadow-[0_25px_60px_rgba(43,43,43,0.14)]">
                <p class="font-display text-lg font-semibold">Pedido más reciente</p>
                <p class="mt-1 text-sm text-[#2B2B2B]/70">#1042, María Gómez</p>
                <div class="mt-5 flex items-end justify-between">
                    <span class="font-display text-2xl font-semibold text-[#27533E]">$1,280.00</span>
                    <span class="rounded-full bg-[#E8CEC8] px-3 py-1 text-xs font-medium text-[#7A3B2E]">Pendiente</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Resumen --}}
    <section class="mt-16 grid grid-cols-2 gap-y-8 rounded-[2.5rem] bg-white px-4 py-8 shadow-[0_10px_40px_rgba(43,43,43,0.06)] lg:grid-cols-4 lg:px-0">
        @foreach ($stats as $s)
            <div class="flex items-center gap-4 px-6 {{ $loop->last ? '' : 'lg:border-r lg:border-[#2B2B2B]/10' }}">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#E8CEC8]/60 text-[#27533E]">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">{!! $icons[$s['icon']] !!}</svg>
                </span>
                <div>
                    <p class="font-display text-3xl font-semibold leading-none">{{ $s['value'] }}</p>
                    <p class="mt-1 text-sm text-[#2B2B2B]/70">{{ $s['label'] }}</p>
                </div>
            </div>
        @endforeach
    </section>

    {{-- Accesos rápidos --}}
    <section class="mt-20">
        <h2 class="font-display text-2xl font-semibold">¿Qué quieres hacer hoy?</h2>
        <div class="mt-8 flex flex-wrap gap-10">
            @foreach ($accesos as $a)
                <a href="#" class="group flex w-28 flex-col items-center gap-3 text-center">
                    <span class="flex h-24 w-24 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E] transition group-hover:bg-[#27533E] group-hover:text-white">
                        <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">{!! $icons[$a['icon']] !!}</svg>
                    </span>
                    <span class="text-sm font-medium">{{ $a['label'] }}</span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- Pedidos recientes --}}
    <section class="mt-20">
        <div class="flex items-end justify-between">
            <h2 class="font-display text-2xl font-semibold">Pedidos recientes</h2>
            <a href="#" class="text-sm font-medium text-[#27533E] underline underline-offset-4">Ver todos los pedidos</a>
        </div>
        <div class="mt-6 overflow-x-auto rounded-[2rem] bg-white p-2 shadow-[0_10px_40px_rgba(43,43,43,0.06)]">
            <table class="w-full min-w-[520px] text-left text-sm">
                <thead class="text-[#2B2B2B]/60">
                    <tr>
                        <th class="px-6 py-4 font-medium">Pedido</th>
                        <th class="px-6 py-4 font-medium">Cliente</th>
                        <th class="px-6 py-4 font-medium">Total</th>
                        <th class="px-6 py-4 font-medium">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $p)
                        <tr class="border-t border-[#2B2B2B]/10">
                            <td class="px-6 py-4 font-medium">{{ $p['id'] }}</td>
                            <td class="px-6 py-4">{{ $p['cliente'] }}</td>
                            <td class="px-6 py-4">{{ $p['total'] }}</td>
                            <td class="px-6 py-4"><span class="rounded-full px-3 py-1 text-xs font-medium {{ $estadoClase[$p['estado']] }}">{{ $p['estado'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- Aviso --}}
    <section class="mt-20 flex flex-col items-start justify-between gap-6 rounded-[2.5rem] bg-[#E8CEC8] p-10 sm:flex-row sm:items-center">
        <div>
            <h2 class="font-display text-2xl font-semibold text-[#27533E]">Reposición de inventario</h2>
            <p class="mt-2 max-w-lg text-[#2B2B2B]/80">Hay 5 productos por debajo del stock mínimo. Avisa al gerente para generar la orden de compra.</p>
        </div>
        <a href="#" class="rounded-full bg-[#27533E] px-7 py-3 text-sm font-medium text-white hover:bg-[#1f4332]">Ver productos con poco stock</a>
    </section>
</div>
@endsection