<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-2xl text-[#27533E] font-semibold tracking-wide leading-tight">
            Panel de Administración - Gerencia
        </h2>
    </x-slot>

    <div class="py-12 bg-[#F9F8F4] min-h-screen font-sans text-[#2B2B2B]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Banner de Bienvenida -->
            <div class="bg-[#27533E] text-[#F9F8F4] p-8 rounded-2xl shadow-md relative overflow-hidden border border-[#27533E]">
                <div class="relative z-10">
                    <h3 class="font-serif text-3xl font-bold mb-2 tracking-wide">Bienvenido, Gerente</h3>
                    <p class="text-[#E8CEC8] text-sm max-w-xl font-light leading-relaxed">
                        Desde este panel exclusivo puedes supervisar las cuentas de usuarios, asignar roles y mantener la elegancia y seguridad de la plataforma e-commerce.
                    </p>
                </div>
                <!-- Detalle visual de fondo -->
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-[#E8CEC8]/10 rounded-full blur-2xl pointer-events-none"></div>
            </div>

            <!-- Mensajes de Alerta -->
            @if(session('success'))
                <div class="p-4 bg-[#E8CEC8]/30 border-l-4 border-[#27533E] text-[#27533E] rounded-r-xl text-sm font-medium shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl text-sm font-medium shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Formulario de Crear / Editar Usuario -->
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-[#E8CEC8]/40">
                <h4 class="font-serif text-xl font-bold text-[#2B2B2B] mb-6 border-b border-[#F9F8F4] pb-3">
                    {{ $editingUser ? 'Editar Usuario: ' . $editingUser->name : 'Registrar Nuevo Usuario' }}
                </h4>

                <form action="{{ $editingUser ? route('gerente.users.update', $editingUser) : route('gerente.users.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    @if($editingUser)
                        @method('PUT')
                    @endif

                    <div>
                        <label class="block text-xs font-semibold text-[#27533E] uppercase tracking-wider mb-2">Nombre Completo</label>
                        <input type="text" name="name" value="{{ old('name', $editingUser?->name) }}" class="w-full rounded-xl border-[#E8CEC8]/60 bg-[#F9F8F4]/40 focus:border-[#27533E] focus:ring focus:ring-[#27533E]/20 text-sm text-[#2B2B2B] p-3">
                        @error('name') <span class="text-xs text-red-500 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-[#27533E] uppercase tracking-wider mb-2">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email', $editingUser?->email) }}" class="w-full rounded-xl border-[#E8CEC8]/60 bg-[#F9F8F4]/40 focus:border-[#27533E] focus:ring focus:ring-[#27533E]/20 text-sm text-[#2B2B2B] p-3">
                        @error('email') <span class="text-xs text-red-500 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-[#27533E] uppercase tracking-wider mb-2">Rol / Nivel de Acceso</label>
                        <select name="rol" class="w-full rounded-xl border-[#E8CEC8]/60 bg-[#F9F8F4]/40 focus:border-[#27533E] focus:ring focus:ring-[#27533E]/20 text-sm text-[#2B2B2B] p-3">
                            <option value="cliente" {{ old('rol', $editingUser?->rol) === 'cliente' ? 'selected' : '' }}>Cliente</option>
                            <option value="empleado" {{ old('rol', $editingUser?->rol) === 'empleado' ? 'selected' : '' }}>Empleado</option>
                            <option value="gerente" {{ old('rol', $editingUser?->rol) === 'gerente' ? 'selected' : '' }}>Gerente</option>
                        </select>
                        @error('rol') <span class="text-xs text-red-500 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-[#27533E] uppercase tracking-wider mb-2">
                            {{ $editingUser ? 'Contraseña (Opcional)' : 'Contraseña' }}
                        </label>
                        <input type="password" name="password" placeholder="{{ $editingUser ? 'Dejar en blanco para mantener' : 'Mínimo 8 caracteres' }}" class="w-full rounded-xl border-[#E8CEC8]/60 bg-[#F9F8F4]/40 focus:border-[#27533E] focus:ring focus:ring-[#27533E]/20 text-sm text-[#2B2B2B] p-3">
                        @error('password') <span class="text-xs text-red-500 block mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2 flex justify-end space-x-4 pt-4 border-t border-[#F9F8F4]">
                        @if($editingUser)
                            <a href="{{ route('gerente.dashboard') }}" class="px-5 py-2.5 rounded-xl text-sm font-medium text-[#2B2B2B] bg-[#F9F8F4] hover:bg-[#E8CEC8]/40 transition">Cancelar Edición</a>
                        @endif
                        <button type="submit" class="bg-[#27533E] hover:bg-[#1e3f2f] text-[#F9F8F4] px-7 py-2.5 rounded-xl text-sm font-medium transition shadow-sm tracking-wide">
                            {{ $editingUser ? 'Actualizar Usuario' : 'Guardar Usuario' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabla CRUD de Listado de Usuarios -->
            <div class="bg-white rounded-2xl shadow-sm border border-[#E8CEC8]/40 overflow-hidden">
                <div class="p-6 border-b border-[#F9F8F4] bg-[#F9F8F4]/30 flex justify-between items-center">
                    <h4 class="font-serif text-lg font-bold text-[#2B2B2B]">Listado General de Usuarios</h4>
                    <span class="text-xs font-medium text-[#27533E] bg-[#E8CEC8]/30 px-3 py-1 rounded-full">Total: {{ $users->total() ?? count($users) }}</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#27533E] text-[#F9F8F4] text-xs font-semibold uppercase tracking-wider">
                                <th class="p-4 pl-6">ID</th>
                                <th class="p-4">Nombre</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Rol</th>
                                <th class="p-4 pr-6 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#F9F8F4] text-sm text-[#2B2B2B]">
                            @foreach($users as $user)
                            <tr class="hover:bg-[#F9F8F4]/50 transition">
                                <td class="p-4 pl-6 font-bold text-xs text-[#27533E]/70">#{{ $user->id }}</td>
                                <td class="p-4 font-semibold text-[#2B2B2B]">{{ $user->name }}</td>
                                <td class="p-4 text-[#2B2B2B]/80">{{ $user->email }}</td>
                                <td class="p-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                        @if($user->rol === 'gerente') bg-[#27533E] text-[#F9F8F4] 
                                        @elseif($user->rol === 'empleado') bg-[#E8CEC8] text-[#2B2B2B] 
                                        @else bg-[#F9F8F4] border border-[#E8CEC8] text-[#2B2B2B] @endif">
                                        {{ ucfirst($user->rol) }}
                                    </span>
                                </td>
                                <td class="p-4 pr-6 text-right space-x-2">
                                    <a href="{{ route('gerente.dashboard', ['edit' => $user->id]) }}" class="inline-block bg-[#E8CEC8]/40 hover:bg-[#E8CEC8] text-[#2B2B2B] px-3.5 py-1.5 rounded-xl text-xs font-medium transition">Editar</a>
                                    
                                    <form action="{{ route('gerente.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás segura de eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 px-3.5 py-1.5 rounded-xl text-xs font-medium transition">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-4 bg-[#F9F8F4]/30 border-t border-[#F9F8F4]">
                    {{ $users->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>