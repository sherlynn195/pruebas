@extends('publico.layout')

@section('title', 'Misión y visión')

@section('content')
<div class="mx-auto max-w-7xl px-6 pt-14">
    <h1 class="font-display text-4xl font-semibold text-[#27533E] sm:text-5xl">Misión y visión</h1>
    <div class="mt-10 grid gap-8 md:grid-cols-2">
        <section class="rounded-[2.5rem] bg-[#E8CEC8] p-10">
            <h2 class="font-display text-2xl font-semibold text-[#27533E]">Nuestra misión</h2>
            <p class="mt-4 leading-relaxed text-[#2B2B2B]/85">
                Ofrecer ropa cómoda y de buena calidad a precios justos, con una compra en línea sencilla y un servicio que genere confianza.
            </p>
        </section>
        <section class="rounded-[2.5rem] bg-[#27533E] p-10 text-white">
            <h2 class="font-display text-2xl font-semibold">Nuestra visión</h2>
            <p class="mt-4 leading-relaxed text-white/90">
                Ser la tienda de moda en línea preferida de la región, reconocida por su calidad, su atención cercana y su cuidado por cada cliente.
            </p>
        </section>
    </div>
</div>
@endsection