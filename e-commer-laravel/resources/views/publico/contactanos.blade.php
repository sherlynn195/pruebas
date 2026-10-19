@extends('publico.layout')

@section('title', 'Contáctanos')

@php
    $medios = [
        ['titulo' => 'Correo', 'dato' => 'contacto@tutienda.com', 'icono' => '<path d="M3 6h18v12H3z"/><path d="M3 7l9 6 9-6"/>'],
        ['titulo' => 'Teléfono', 'dato' => '+52 961 000 0000', 'icono' => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"/>'],
        ['titulo' => 'Redes sociales', 'dato' => '@tutienda', 'icono' => '<circle cx="12" cy="12" r="4"/><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="17.5" cy="6.5" r=".6"/>'],
    ];
@endphp

@section('content')
<div class="mx-auto max-w-7xl px-6 pt-14">
    <h1 class="font-display text-4xl font-semibold text-[#27533E] sm:text-5xl">Contáctanos</h1>
    <p class="mt-6 max-w-xl text-lg leading-relaxed text-[#2B2B2B]/80">¿Tienes dudas sobre un pedido o una prenda? Escríbenos y te respondemos en menos de un día hábil.</p>
    <div class="mt-10 grid gap-8 md:grid-cols-3">
        @foreach ($medios as $m)
            <div class="rounded-[2rem] bg-white p-8 shadow-[0_10px_40px_rgba(43,43,43,0.06)]">
                <span class="flex h-14 w-14 items-center justify-center rounded-full bg-[#E8CEC8] text-[#27533E]">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">{!! $m['icono'] !!}</svg>
                </span>
                <h2 class="mt-5 font-display text-xl font-semibold">{{ $m['titulo'] }}</h2>
                <p class="mt-1 text-[#2B2B2B]/80">{{ $m['dato'] }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection