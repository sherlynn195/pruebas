@extends('publico.layout')

@section('title', 'Registrarse')

@section('content')
<div class="mx-auto grid max-w-6xl items-center gap-12 px-6 pt-14 lg:grid-cols-2">

    <div class="relative">
        <svg class="absolute -left-10 -top-10 -z-10 h-80 w-80 text-[#E8CEC8]" viewBox="0 0 200 200" aria-hidden="true">
            <path fill="currentColor" transform="translate(100 100)" d="M44.7,-58.3C57.6,-48.6,67.6,-34.3,72.5,-18.1C77.4,-1.9,77.3,16.1,69.8,29.9C62.3,43.7,47.5,53.3,32.1,60.4C16.7,67.5,0.7,72.1,-15.5,70.1C-31.7,68.1,-48.1,59.5,-58.7,46.3C-69.3,33.1,-74.1,15.3,-72.4,-1C-70.7,-17.3,-62.5,-32,-51.3,-42.2C-40.1,-52.4,-25.9,-58.1,-10.4,-60.9C5.1,-63.7,31.8,-68,44.7,-58.3Z"/>
        </svg>
        <h1 class="font-display text-4xl font-semibold leading-tight text-[#27533E] sm:text-5xl">Crea tu cuenta</h1>
        <p class="mt-5 max-w-sm text-lg leading-relaxed text-[#2B2B2B]/80">
            Regístrate para guardar tus datos y seguir tus pedidos desde un solo lugar.
        </p>
    </div>

    <div class="rounded-[2.5rem] bg-white p-8 shadow-[0_25px_60px_rgba(43,43,43,0.10)] sm:p-10">
        <h2 class="font-display text-2xl font-semibold">Registrarse</h2>

        <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-5">
            @csrf

            <div>
                <label for="nombre" class="text-sm font-medium">Nombre(s)</label>
                <input id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus autocomplete="given-name"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('nombre')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="apellidos" class="text-sm font-medium">Apellidos</label>
                <input id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="family-name"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('apellidos')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="correo" class="text-sm font-medium">Correo electrónico</label>
                <input id="correo" type="email" name="correo" value="{{ old('correo') }}" required autocomplete="username"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('correo')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="clave" class="text-sm font-medium">Contraseña</label>
                <input id="clave" type="password" name="clave" required autocomplete="new-password"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('clave')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="clave_confirmation" class="text-sm font-medium">Confirmar contraseña</label>
                <input id="clave_confirmation" type="password" name="clave_confirmation" required autocomplete="new-password"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('clave_confirmation')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full rounded-full bg-[#27533E] px-6 py-3.5 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.25)] hover:bg-[#1f4332]">
                Crear mi cuenta
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-[#2B2B2B]/70">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="font-medium text-[#27533E] underline underline-offset-4">Iniciar sesión</a>
        </p>
    </div>
</div>
@endsection
