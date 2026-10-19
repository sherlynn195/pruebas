@extends('publico.layout')

@section('title', 'Ubicación')

@section('content')
<div class="mx-auto max-w-7xl px-6 pt-14">
    <h1 class="font-display text-4xl font-semibold text-[#27533E] sm:text-5xl">Ubicación</h1>
    <div class="mt-10 grid gap-8 lg:grid-cols-2">
        <div class="rounded-[2.5rem] bg-white p-10 shadow-[0_10px_40px_rgba(43,43,43,0.06)]">
            <h2 class="font-display text-2xl font-semibold">Visítanos</h2>
            <p class="mt-4 leading-relaxed text-[#2B2B2B]/80">Calle Central #123, Colonia Centro<br>Tuxtla Gutiérrez, Chiapas</p>
            <h2 class="mt-8 font-display text-2xl font-semibold">Horario de atención</h2>
            <p class="mt-4 leading-relaxed text-[#2B2B2B]/80">Lunes a viernes: 9:00 a 19:00<br>Sábado: 10:00 a 15:00<br>Domingo: cerrado</p>
        </div>
        <div class="flex min-h-[18rem] items-center justify-center rounded-[2.5rem] bg-[#E8CEC8] text-[#27533E]">
            <div class="text-center">
                <svg class="mx-auto h-14 w-14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-6.2-7-11a7 7 0 0114 0c0 4.8-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>
                <p class="mt-3 font-display text-lg font-semibold">Aquí puedes insertar tu mapa</p>
            </div>
        </div>
    </div>
</div>
@endsection