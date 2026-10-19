@extends('publico.layout')

@section('title', 'Quiénes somos')

@section('content')
<div class="mx-auto max-w-7xl px-6 pt-14">
    <div class="grid items-center gap-12 lg:grid-cols-2">
        <div>
            <h1 class="font-display text-4xl font-semibold text-[#27533E] sm:text-5xl">Quiénes somos</h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-[#2B2B2B]/80">
                Somos una tienda en línea de moda cómoda, pensada para quienes buscan prendas bonitas que duren. Empezamos como un proyecto pequeño y hoy vendemos a todo el país.
            </p>
            <p class="mt-4 max-w-xl text-lg leading-relaxed text-[#2B2B2B]/80">
                Elegimos telas suaves, colores tranquilos y proveedores que cuidan la calidad, y atendemos cada pedido con el mismo cuidado que si fuera el primero.
            </p>
        </div>
        <div class="rounded-[3rem] bg-[#E8CEC8] p-10">
            <ul class="space-y-6">
                <li><p class="font-display text-xl font-semibold text-[#27533E]">Calidad</p><p class="text-[#2B2B2B]/80">Prendas que resisten el uso diario.</p></li>
                <li><p class="font-display text-xl font-semibold text-[#27533E]">Cercanía</p><p class="text-[#2B2B2B]/80">Te respondemos rápido y sin vueltas.</p></li>
                <li><p class="font-display text-xl font-semibold text-[#27533E]">Compromiso</p><p class="text-[#2B2B2B]/80">Cuidamos cada pedido hasta que llega a tu casa.</p></li>
            </ul>
        </div>
    </div>
</div>
@endsection