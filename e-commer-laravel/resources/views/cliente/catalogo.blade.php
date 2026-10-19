
<x-app-layout>
    <div class="min-h-screen bg-[#FAF8F4] text-[#264F3F]">

        {{-- Encabezado de la tienda --}}
        <header class="border-b border-[#E8E3DB] bg-[#FAF8F4]">
            <div class="mx-auto flex max-w-7xl flex-wrap items-center
                        justify-between gap-4 px-6 py-5">

                <a href="{{ route('cliente.dashboard') }}"
                   class="text-2xl font-bold tracking-tight"
                   style="font-family: Georgia, serif;">
                    ◉ Shop free
                </a>

                <div class="flex flex-wrap items-center gap-5 text-sm">
                    <a href="{{ route('cliente.dashboard') }}"
                       class="transition hover:text-[#A36F65]">
                        Inicio
                    </a>

                    <a href="#categorias"
                       class="transition hover:text-[#A36F65]">
                        Categorías
                    </a>

                    <a href="#productos"
                       class="transition hover:text-[#A36F65]">
                        Productos
                    </a>

                    <span class="rounded-full border border-[#264F3F]
                                 px-4 py-2">
                        Mi cuenta
                    </span>
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-6">

            {{-- Banner principal --}}
            <section class="grid items-center gap-10 py-14
                            md:grid-cols-2 md:py-20">

                <div>
                    <p class="mb-4 text-sm font-semibold uppercase
                              tracking-[0.22em] text-[#A36F65]">
                        Tu estilo, tu esencia
                    </p>

                    <h1 class="max-w-xl text-5xl font-medium
                               leading-tight md:text-6xl"
                        style="font-family: Georgia, serif;">
                        Encuentra tu estilo, siéntete en casa.
                    </h1>

                    <p class="mt-6 max-w-lg text-lg leading-8
                              text-[#68665F]">
                        Descubre prendas y accesorios seleccionados
                        para acompañarte todos los días.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                     <a href="#productos"
                        class="inline-block rounded-full bg-[#264F3F] px-7 py-3
                                font-semibold text-white shadow-md
                                transition hover:bg-[#1D4032]">
                            Explorar productos
                        </a>

                        <a href="#categorias"
                           class="rounded-full border border-[#264F3F]
                                  px-7 py-3 font-semibold
                                  transition hover:bg-[#EEE8E0]">
                            Ver categorías
                        </a>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-md">
                    <div class="absolute inset-8 rounded-full
                                bg-[#E8CECA]"></div>

                    <div class="relative rounded-[2rem] border
                                border-white bg-white p-5 shadow-xl">
                        <img
                            src="{{ $productos[0]['imagen'] ?? 'https://placehold.co/600x500?text=Shop+Free' }}"
                            alt="Producto destacado de Shop Free"
                            class="h-72 w-full rounded-2xl bg-[#F5F2ED]
                                   object-cover"
                        >

                        <div class="flex items-center justify-between gap-3
                                    px-1 pb-1 pt-5">
                            <div>
                                <p class="text-lg font-semibold"
                                   style="font-family: Georgia, serif;">
                                    {{ $productos[0]['nombre'] ?? 'Descubre Shop Free' }}
                                </p>

                                <p class="mt-1 text-sm text-[#77736C]">
                                    Nuestro estilo destacado
                                </p>
                            </div>

                            <span class="rounded-full bg-[#264F3F] px-3
                                         py-2 text-sm font-semibold
                                         text-white">
                                Favorito
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Categorías --}}
            <section id="categorias" class="py-10">
                <div class="mb-8">
                    <p class="text-sm uppercase tracking-widest
                              text-[#A36F65]">
                        Explora la colección
                    </p>

                    <h2 class="mt-2 text-3xl font-medium text-[#292C27]"
                        style="font-family: Georgia, serif;">
                        Compra por categoría
                    </h2>
                </div>

                <div class="grid grid-cols-2 gap-5 sm:grid-cols-4">
                    @foreach ([
                        ['icono' => '♧', 'nombre' => 'Vestidos'],
                        ['icono' => '♧', 'nombre' => 'Blusas'],
                        ['icono' => '◇', 'nombre' => 'Accesorios'],
                        ['icono' => '♡', 'nombre' => 'Ofertas'],
                    ] as $categoria)
                        <a href="#productos"
                           class="group flex flex-col items-center
                                  rounded-2xl border border-[#EEE5DE]
                                  bg-white p-5 text-center
                                  transition hover:-translate-y-1
                                  hover:shadow-md">

                            <span class="flex h-24 w-24 items-center
                                         justify-center rounded-full
                                         bg-[#E8CECA] text-4xl
                                         text-[#264F3F]
                                         transition group-hover:bg-[#DFC0BB]">
                                {{ $categoria['icono'] }}
                            </span>

                            <span class="mt-4 font-semibold">
                                {{ $categoria['nombre'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </section>

            {{-- Productos --}}
            <section id="productos" class="py-14">
                <div class="mb-8 flex flex-wrap items-end
                            justify-between gap-4">
                    <div>
                        <p class="text-sm uppercase tracking-widest
                                  text-[#A36F65]">
                            Selección especial
                        </p>

                        <h2 class="mt-2 text-3xl font-medium
                                   text-[#292C27]"
                            style="font-family: Georgia, serif;">
                            Nuestros productos
                        </h2>

                        <p class="mt-2 text-[#68665F]">
                            Encuentra algo que vaya contigo.
                        </p>
                    </div>

                    <span class="text-sm text-[#68665F]">
                        {{ count($productos) }} productos
                    </span>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2
                            lg:grid-cols-4">

                    @forelse ($productos as $producto)
                        <article class="group overflow-hidden rounded-2xl
                                        border border-[#EEE5DE] bg-white
                                        transition hover:-translate-y-1
                                        hover:shadow-lg">

                            <div class="overflow-hidden bg-[#F1EEE8]">
                                <img
                                    src="{{ $producto['imagen'] }}"
                                    alt="{{ $producto['nombre'] }}"
                                    loading="lazy"
                                    class="h-64 w-full object-cover
                                           transition duration-500
                                           group-hover:scale-105"
                                >
                            </div>

                            <div class="p-5">
                                <p class="text-xs uppercase tracking-widest
                                          text-[#A36F65]">
                                    Shop Free
                                </p>

                                <h3 class="mt-2 text-lg font-semibold
                                           text-[#292C27]">
                                    {{ $producto['nombre'] }}
                                </h3>

                                <p class="mt-2 min-h-10 text-sm leading-6
                                          text-[#77736C]">
                                    {{ $producto['descripcion'] }}
                                </p>

                                <div class="mt-5 flex items-center
                                            justify-between gap-3">
                                    <span class="text-xl font-bold
                                                 text-[#264F3F]">
                                        ${{ number_format($producto['precio'], 2) }}
                                    </span>

                                    <button
                                        type="button"
                                        class="rounded-full border
                                               border-[#264F3F] px-4 py-2
                                               text-sm font-semibold
                                               transition hover:bg-[#264F3F]
                                               hover:text-white"
                                    >
                                        Ver producto
                                    </button>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="col-span-full rounded-xl bg-white
                                  p-8 text-center text-[#68665F]">
                            Por el momento no hay productos disponibles.
                        </p>
                    @endforelse

                </div>
            </section>

            {{-- Mensaje final --}}
            <section class="mb-12 rounded-3xl bg-[#264F3F]
                px-6 py-12 text-center text-white md:px-12">
    <p class="text-sm uppercase tracking-[0.2em] text-[#E8CECA]">
        SHOP FREE
    </p>

    <h2 class="mt-3 text-3xl font-medium text-white md:text-4xl"
        style="font-family: Georgia, serif;">
        Tu estilo comienza aquí.
    </h2>

    <p class="mx-auto mt-4 max-w-xl leading-7 text-white">
        Explora nuestra selección y encuentra tus próximos favoritos.
    </p>

    <a href="#productos"
       class="mt-7 inline-block rounded-full bg-[#FAF8F4]
              px-7 py-3 font-semibold text-[#264F3F]
              transition hover:bg-[#E8CECA]">
        Explorar colección
    </a>
</section>

        </main>

        {{-- Pie de página --}}
        <footer class="border-t border-[#E8E3DB] bg-[#F3F0E9]">
            <div class="mx-auto flex max-w-7xl flex-col
                        items-center justify-between gap-3 px-6 py-6
                        text-center text-sm text-[#68665F] sm:flex-row">
                <span class="font-semibold text-[#264F3F]">
                    Shop free
                </span>

                <span>
                    Encuentra tu estilo, siéntete en casa.
                </span>

                <span>© {{ date('Y') }} Shop Free</span>
            </div>
        </footer>

    </div>
</x-app-layout>
