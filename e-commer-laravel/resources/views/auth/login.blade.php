@extends('publico.layout')

@section('title', 'Iniciar sesión')

@section('content')
<div class="mx-auto grid max-w-6xl items-center gap-12 px-6 pt-14 lg:grid-cols-2">

    {{-- Texto de bienvenida con fondo orgánico --}}
    <div class="relative">
        <svg class="absolute -left-10 -top-10 -z-10 h-80 w-80 text-[#E8CEC8]" viewBox="0 0 200 200" aria-hidden="true">
            <path fill="currentColor" transform="translate(100 100)" d="M44.7,-58.3C57.6,-48.6,67.6,-34.3,72.5,-18.1C77.4,-1.9,77.3,16.1,69.8,29.9C62.3,43.7,47.5,53.3,32.1,60.4C16.7,67.5,0.7,72.1,-15.5,70.1C-31.7,68.1,-48.1,59.5,-58.7,46.3C-69.3,33.1,-74.1,15.3,-72.4,-1C-70.7,-17.3,-62.5,-32,-51.3,-42.2C-40.1,-52.4,-25.9,-58.1,-10.4,-60.9C5.1,-63.7,31.8,-68,44.7,-58.3Z"/>
        </svg>
        <h1 class="font-display text-4xl font-semibold leading-tight text-[#27533E] sm:text-5xl">Qué bueno verte de nuevo</h1>
        <p class="mt-5 max-w-sm text-lg leading-relaxed text-[#2B2B2B]/80">
            Entra a tu cuenta para ver tus pedidos y continuar donde te quedaste.
        </p>
    </div>

    {{-- Formulario --}}
    <div class="rounded-[2.5rem] bg-white p-8 shadow-[0_25px_60px_rgba(43,43,43,0.10)] sm:p-10">
        <h2 class="font-display text-2xl font-semibold">Iniciar sesión</h2>

        @if (session('status'))
            <p class="mt-4 rounded-2xl bg-[#27533E]/10 px-4 py-3 text-sm text-[#27533E]">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-5">
            @csrf

            <div>
                <label for="email" class="text-sm font-medium">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('email')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="text-sm font-medium">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('password')
                    <p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between gap-4 text-sm">
                <label for="remember_me" class="inline-flex items-center gap-2">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-[#2B2B2B]/30 accent-[#27533E]">
                    Mantener mi sesión iniciada
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-[#27533E] underline underline-offset-4">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            <button type="submit" class="w-full rounded-full bg-[#27533E] px-6 py-3.5 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.25)] hover:bg-[#1f4332]">
                Iniciar sesión
            </button>
        </form>

        @if (Route::has('register'))
            <p class="mt-6 text-center text-sm text-[#2B2B2B]/70">
                ¿Aún no tienes cuenta?
                <a href="{{ route('register') }}" class="font-medium text-[#27533E] underline underline-offset-4">Regístrate</a>
            </p>
        @endif
    </div>
</div>
@endsection