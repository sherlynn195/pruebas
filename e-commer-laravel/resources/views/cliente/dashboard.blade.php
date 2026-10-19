
<x-app-layout>
    <div class="min-h-screen bg-[#FAF8F3] text-[#263D32]">

        {{-- PORTADA --}}
        <section class="relative overflow-hidden">
            <div class="mx-auto grid max-w-7xl items-center gap-10 px-6 py-16 md:grid-cols-2 md:py-24">

                <div class="relative z-10">
                    <span class="mb-5 inline-block rounded-full bg-[#E8EDE5] px-4 py-2 text-sm font-medium">
                        ✨ Tu estilo, tu esencia
                    </span>

                    <h1 class="text-5xl font-bold leading-tight tracking-tight md:text-7xl">
                        Moda que se siente
                        <span class="font-serif italic text-[#9A786A]">
                            como en casa.
                        </span>
                    </h1>

                    <p class="mt-6 max-w-lg text-lg leading-8 text-gray-600">
                        Descubre prendas y accesorios seleccionados para acompañarte
                        todos los días. Encuentra ese estilo que habla de ti.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#productos"
                           class="rounded-full bg-[#294737] px-7 py-3.5 font-semibold text-white transition hover:bg-[#1D3528]">
                            Explorar colección
                        </a>

                        <a href="#categorias"
                           class="rounded-full border border-[#294737] px-7 py-3.5 font-semibold transition hover:bg-[#E8EDE5]">
                            Ver categorías
                        </a>
                    </div>

                    <div class="mt-10 flex flex-wrap gap-8 text-sm text-gray-600">
                        <div>
                            <span class="block text-xl font-bold text-[#294737]">Tu estilo</span>
                            <span>Tu personalidad</span>
                        </div>
                        <div>
                            <span class="block text-xl font-bold text-[#294737]">Cada día</span>
                            <span>Nuevas posibilidades</span>
                        </div>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-lg">
                    <div class="absolute -right-5 -top-5 h-32 w-32 rounded-full bg-[#E8D8CF]"></div>
                    <div class="absolute -bottom-5 -left-5 h-28 w-28 rounded-full bg-[#DDE5D9]"></div>

                    <img
                        src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1000&q=85"
                        alt="Colección de moda"
                        class="relative h-[420px] w-full rounded-[2rem] object-cover shadow-xl md:h-[520px]"
                    >

                    <div class="absolute bottom-6 left-6 rounded-2xl bg-white/95 p-4 shadow-lg">
                        <p class="text-sm text-gray-500">Descubre tu próximo favorito</p>
                        <p class="mt-1 font-semibold">Una colección para ti ♡</p>
                    </div>
                </div>

            </div>
        </section>

        {{-- CATEGORÍAS --}}
        <section id="categorias" class="border-y border-[#E9E4DA] bg-white py-16">
            <div class="mx-auto max-w-7xl px-6">

                <div class="mb-10 text-center">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#9A786A]">
                        Encuentra tu estilo
                    </p>
                    <h2 class="mt-3 font-serif text-4xl font-bold">
                        Explora nuestras categorías
                    </h2>
                    <p class="mx-auto mt-4 max-w-xl text-gray-600">
                        Inspírate y encuentra piezas que combinen contigo.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    <a href="#productos" class="group overflow-hidden rounded-2xl bg-[#F5F0E8]">
                        <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=600&q=80"
                             alt="Ropa para mujer"
                             class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="p-5">
                            <h3 class="text-xl font-semibold">Ropa</h3>
                            <p class="mt-1 text-sm text-gray-600">Encuentra tus favoritos</p>
                        </div>
                    </a>

                    <a href="#productos" class="group overflow-hidden rounded-2xl bg-[#F5F0E8]">
                        <img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=600&q=80"
                             alt="Conjuntos y tendencias"
                             class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="p-5">
                            <h3 class="text-xl font-semibold">Conjuntos</h3>
                            <p class="mt-1 text-sm text-gray-600">Combina a tu manera</p>
                        </div>
                    </a>

                    <a href="#productos" class="group overflow-hidden rounded-2xl bg-[#F5F0E8]">
                        <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=600&q=80"
                             alt="Prendas de temporada"
                             class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="p-5">
                            <h3 class="text-xl font-semibold">Temporada</h3>
                            <p class="mt-1 text-sm text-gray-600">Nuevas inspiraciones</p>
                        </div>
                    </a>

                    <a href="#productos" class="group overflow-hidden rounded-2xl bg-[#F5F0E8]">
                        <img src="https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=600&q=80"
                             alt="Accesorios de moda"
                             class="h-56 w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="p-5">
                            <h3 class="text-xl font-semibold">Accesorios</h3>
                            <p class="mt-1 text-sm text-gray-600">Los detalles importan</p>
                        </div>
                    </a>

                </div>
            </div>
        </section>

        {{-- PRODUCTOS DESTACADOS --}}
        <section id="productos" class="py-16 md:py-20">
            <div class="mx-auto max-w-7xl px-6">

                <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#9A786A]">
                            Selección especial
                        </p>
                        <h2 class="mt-3 font-serif text-4xl font-bold">
                            Favoritos para ti
                        </h2>
                        <p class="mt-3 text-gray-600">
                            Descubre algunas de nuestras piezas destacadas.
                        </p>
                    </div>

                    <span class="text-sm text-gray-500">
                        Colección de muestra
                    </span>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-7 sm:grid-cols-2 lg:grid-cols-4">

                    <article class="group">
                        <div class="relative overflow-hidden rounded-2xl bg-[#F0EAE1]">
                            <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=700&q=80"
                                 alt="Vestido elegante"
                                 class="h-80 w-full object-cover transition duration-500 group-hover:scale-105">
                            <span class="absolute left-4 top-4 rounded-full bg-white px-3 py-1 text-xs font-semibold">
                                DESTACADO
                            </span>
                        </div>
                        <div class="mt-4 flex items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Vestido elegante</h3>
                                <p class="mt-1 text-sm text-gray-500">Estilo y comodidad</p>
                            </div>
                            <span class="font-bold">$599.00</span>
                        </div>
                    </article>

                    <article class="group">
                        <div class="overflow-hidden rounded-2xl bg-[#F0EAE1]">
                            <img src="https://images.unsplash.com/photo-1551163943-3f6a855d1153?auto=format&fit=crop&w=700&q=80"
                                 alt="Blusa casual"
                                 class="h-80 w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="mt-4 flex items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Blusa casual</h3>
                                <p class="mt-1 text-sm text-gray-500">Ideal para cada día</p>
                            </div>
                            <span class="font-bold">$349.00</span>
                        </div>
                    </article>

                    <article class="group">
                        <div class="overflow-hidden rounded-2xl bg-[#F0EAE1]">
                            <img src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?auto=format&fit=crop&w=700&q=80"
                                 alt="Bolso de moda"
                                 class="h-80 w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="mt-4 flex items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Bolso clásico</h3>
                                <p class="mt-1 text-sm text-gray-500">Un toque especial</p>
                            </div>
                            <span class="font-bold">$449.00</span>
                        </div>
                    </article>

                    <article class="group">
                        <div class="overflow-hidden rounded-2xl bg-[#F0EAE1]">
                            <img src="https://images.unsplash.com/photo-1611652022419-a9419f74343d?auto=format&fit=crop&w=700&q=80"
                                 alt="Accesorios delicados"
                                 class="h-80 w-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="mt-4 flex items-start justify-between gap-3">
                            <div>
                                <h3 class="font-semibold">Accesorios delicados</h3>
                                <p class="mt-1 text-sm text-gray-500">Pequeños detalles</p>
                            </div>
                            <span class="font-bold">$199.00</span>
                        </div>
                    </article>

                </div>

                <p class="mt-8 text-center text-sm text-gray-500">
                    Los productos y precios mostrados son ejemplos visuales.
                </p>

            </div>
        </section>

        {{-- INVITACIÓN --}}
        <section class="px-6 pb-16">
            <div class="mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-[#294737] px-6 py-14 text-center text-white md:px-16 md:py-20">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#E8D8CF]">
                    Tu próxima elección favorita
                </p>
                <h2 class="mx-auto mt-4 max-w-2xl font-serif text-4xl font-bold md:text-5xl">
                    Tu estilo comienza aquí.
                </h2>
                <p class="mx-auto mt-5 max-w-xl leading-7 text-white/80">
                    Explora, inspírate y encuentra las prendas que te hacen sentir bien.
                </p>
                <a href="#categorias"
                   class="mt-8 inline-block rounded-full bg-[#F5F0E8] px-8 py-3.5 font-semibold text-[#294737] transition hover:bg-white">
                    Descubrir colección
                </a>
            </div>
        </section>

        {{-- PIE DE PÁGINA --}}
        <footer class="border-t border-[#E9E4DA] bg-white">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-6 py-8 text-sm text-gray-500 md:flex-row md:items-center md:justify-between">
                <p class="font-serif text-xl font-bold text-[#294737]">Shop free</p>
                <p>Encuentra tu estilo, expresa tu esencia.</p>
                <p>© {{ date('Y') }} Shop free</p>
            </div>
        </footer>

    </div>
</x-app-layout>
