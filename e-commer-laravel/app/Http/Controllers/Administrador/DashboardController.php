<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = Usuario::latest()->paginate(10);
        $editingUser = $request->has('edit')
            ? Usuario::find($request->query('edit'))
            : null;

        return view('administrador.dashboard', compact('users', 'editingUser'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,correo'],
            'clave' => ['required', 'string', 'min:8'],
            'rol' => ['required', Rule::in(['administrador', 'gerente', 'cliente'])],
        ]);

        Usuario::create($validated);

        return redirect()->route('administrador.dashboard')->with('success', 'Usuario creado correctamente.');
    }

    public function updateUser(Request $request, Usuario $user)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios', 'correo')->ignore($user->id)],
            'clave' => ['nullable', 'string', 'min:8'],
            'rol' => ['required', Rule::in(['administrador', 'gerente', 'cliente'])],
        ]);

        $user->nombre = $validated['nombre'];
        $user->apellidos = $validated['apellidos'];
        $user->correo = $validated['correo'];
        $user->rol = $validated['rol'];

        if (! empty($validated['clave'])) {
            $user->clave = $validated['clave'];
        }

        $user->save();

        return redirect()->route('administrador.dashboard')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroyUser(Usuario $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('administrador.dashboard')->with('error', 'No puedes eliminar tu propia cuenta de administrador.');
        }

        $user->delete();

        return redirect()->route('administrador.dashboard')->with('success', 'Usuario eliminado correctamente.');
    }
}
