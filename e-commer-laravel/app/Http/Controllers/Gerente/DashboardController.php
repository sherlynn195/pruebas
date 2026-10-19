<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10);
        
        // Si viene un ID de usuario para editar, lo cargamos
        $editingUser = $request->has('edit') ? User::find($request->query('edit')) : null;

        return view('gerente.dashboard', compact('users', 'editingUser'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'rol'      => ['required', Rule::in(['cliente', 'empleado', 'gerente'])],
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'rol'      => $validated['rol'],
        ]);

        return redirect()->route('gerente.dashboard')->with('success', 'Usuario creado correctamente.');
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'rol'   => ['required', Rule::in(['cliente', 'empleado', 'gerente'])],
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        $user->rol   = $validated['rol'];

        if ($request->filled('password')) {
            $request->validate(['password' => ['min:8']]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('gerente.dashboard')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroyUser(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('gerente.dashboard')->with('error', 'No puedes eliminar tu propia cuenta de gerente.');
        }

        $user->delete();

        return redirect()->route('gerente.dashboard')->with('success', 'Usuario eliminado correctamente.');
    }
}