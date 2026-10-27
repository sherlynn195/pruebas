@extends('layouts.panel')

@section('title', 'Gestión de usuarios')

@section('content')
<div class="space-y-10 pb-10">
    <header>
        <h1 class="font-display text-4xl font-semibold text-[#27533E] sm:text-5xl">Gestión de usuarios</h1>
        <p class="mt-3 max-w-2xl text-[#2B2B2B]/70">Administra las cuentas y los permisos de acceso de la tienda.</p>
    </header>

    <section class="rounded-[2rem] bg-white p-6 shadow-[0_10px_40px_rgba(43,43,43,0.06)] sm:p-8">
        <h2 class="font-display text-2xl font-semibold text-[#27533E]">Registrar usuario</h2>
        <form method="POST" action="{{ route('administrador.users.store') }}" class="mt-6 grid gap-5 sm:grid-cols-2">
            @csrf
            <div>
                <label for="nombre" class="text-sm font-medium">Nombre</label>
                <input id="nombre" name="nombre" value="{{ old('nombre') }}" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('nombre')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="apellidos" class="text-sm font-medium">Apellidos</label>
                <input id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('apellidos')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="correo" class="text-sm font-medium">Correo electrónico</label>
                <input id="correo" type="email" name="correo" value="{{ old('correo') }}" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('correo')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="clave" class="text-sm font-medium">Clave</label>
                <input id="clave" type="password" name="clave" required autocomplete="new-password" class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                @error('clave')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="rol" class="text-sm font-medium">Rol</label>
                <select id="rol" name="rol" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                    @foreach (['administrador' => 'Administrador', 'gerente' => 'Gerente', 'cliente' => 'Cliente'] as $valor => $etiqueta)
                        <option value="{{ $valor }}" @selected(old('rol', 'cliente') === $valor)>{{ $etiqueta }}</option>
                    @endforeach
                </select>
                @error('rol')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-end">
                <button type="submit" class="rounded-full bg-[#27533E] px-7 py-3 text-sm font-medium text-white shadow-[0_10px_30px_rgba(39,83,62,0.20)] hover:bg-[#1f4332]">Crear usuario</button>
            </div>
        </form>
    </section>

    <section class="rounded-[2rem] bg-white p-6 shadow-[0_10px_40px_rgba(43,43,43,0.06)] sm:p-8">
        <h2 class="font-display text-2xl font-semibold text-[#27533E]">Usuarios registrados</h2>
        <div class="mt-6 overflow-x-auto">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="text-[#2B2B2B]/60">
                    <tr>
                        <th class="px-4 py-4 font-medium">Nombre</th>
                        <th class="px-4 py-4 font-medium">Correo</th>
                        <th class="px-4 py-4 font-medium">Rol</th>
                        <th class="px-4 py-4 font-medium">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-t border-[#2B2B2B]/10 align-top">
                            <td class="px-4 py-4 font-medium">{{ $user->nombre }} {{ $user->apellidos }}</td>
                            <td class="px-4 py-4">{{ $user->correo }}</td>
                            <td class="px-4 py-4">
                                @php
                                    $claseRol = match ($user->rol) {
                                        'administrador' => 'bg-[#27533E] text-white',
                                        'gerente' => 'bg-[#E8CEC8] text-[#7A3B2E]',
                                        default => 'bg-[#27533E]/10 text-[#27533E]',
                                    };
                                @endphp
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $claseRol }}">{{ ucfirst($user->rol) }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex flex-wrap items-start gap-3">
                                    <details class="relative">
                                        <summary class="cursor-pointer list-none rounded-full border border-[#27533E] px-4 py-2 text-xs font-medium text-[#27533E] hover:bg-[#27533E]/5">Editar</summary>
                                        <div class="absolute right-0 z-20 mt-3 w-[min(90vw,38rem)] rounded-2xl bg-white p-5 shadow-[0_20px_50px_rgba(43,43,43,0.16)]">
                                            <form method="POST" action="{{ route('administrador.users.update', $user) }}" class="grid gap-4 sm:grid-cols-2">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="nombre-{{ $user->id }}" class="text-sm font-medium">Nombre</label>
                                                    <input id="nombre-{{ $user->id }}" name="nombre" value="{{ old('nombre', $user->nombre) }}" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                                                    @error('nombre')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
                                                </div>
                                                <div>
                                                    <label for="apellidos-{{ $user->id }}" class="text-sm font-medium">Apellidos</label>
                                                    <input id="apellidos-{{ $user->id }}" name="apellidos" value="{{ old('apellidos', $user->apellidos) }}" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                                                    @error('apellidos')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
                                                </div>
                                                <div>
                                                    <label for="correo-{{ $user->id }}" class="text-sm font-medium">Correo</label>
                                                    <input id="correo-{{ $user->id }}" type="email" name="correo" value="{{ old('correo', $user->correo) }}" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                                                    @error('correo')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
                                                </div>
                                                <div>
                                                    <label for="clave-{{ $user->id }}" class="text-sm font-medium">Clave</label>
                                                    <input id="clave-{{ $user->id }}" type="password" name="clave" autocomplete="new-password" placeholder="Deja vacío para no cambiarla" class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                                                    <p class="mt-1 text-xs text-[#2B2B2B]/60">Deja vacío para no cambiarla.</p>
                                                    @error('clave')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
                                                </div>
                                                <div>
                                                    <label for="rol-{{ $user->id }}" class="text-sm font-medium">Rol</label>
                                                    <select id="rol-{{ $user->id }}" name="rol" required class="mt-2 block w-full rounded-2xl border border-[#2B2B2B]/15 bg-[#F9F8F4] px-4 py-3 text-sm focus:border-[#27533E] focus:outline-none focus:ring-2 focus:ring-[#27533E]/30">
                                                        @foreach (['administrador' => 'Administrador', 'gerente' => 'Gerente', 'cliente' => 'Cliente'] as $valor => $etiqueta)
                                                            <option value="{{ $valor }}" @selected(old('rol', $user->rol) === $valor)>{{ $etiqueta }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('rol')<p class="mt-2 text-sm text-[#9B2C2C]">{{ $message }}</p>@enderror
                                                </div>
                                                <div class="flex items-end">
                                                    <button type="submit" class="rounded-full bg-[#27533E] px-5 py-3 text-sm font-medium text-white hover:bg-[#1f4332]">Guardar cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </details>
                                    @if (auth()->id() !== $user->id)
                                        <form method="POST" action="{{ route('administrador.users.destroy', $user) }}" onsubmit="return confirm('¿Eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-full border border-[#9B2C2C]/40 px-4 py-2 text-xs font-medium text-[#9B2C2C] hover:bg-[#9B2C2C]/5">Eliminar</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-10 text-center text-sm text-[#2B2B2B]/65">Aún no hay usuarios registrados. Puedes crear la primera cuenta con el formulario de arriba.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if (method_exists($users, 'links'))
            <div class="mt-6">{{ $users->links() }}</div>
        @endif
    </section>
</div>
@endsection
