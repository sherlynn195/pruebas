<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        // El guard compara la clave escrita contra Usuario::getAuthPassword()
        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->clave,
        ];

        if (Auth::attempt($credenciales, $request->boolean('remember'))) {
            $request->session()->regenerate();

            Log::channel('autenticacion')->info('Login exitoso', [
                'usuario_id' => Auth::id(),
                'correo' => Auth::user()->correo,
                'ip' => $request->ip(),
            ]);

            return redirect()->intended(route('dashboard'));
        }

        Log::channel('autenticacion')->warning('Login incorrecto', [
            'correo' => $request->correo,
            'ip' => $request->ip(),
        ]);

        return back()
            ->withErrors(['correo' => 'El correo o la contraseña no son correctos.'])
            ->onlyInput('correo');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegistroRequest $request)
    {
        // El rol nunca viene del formulario: todo registro público es cliente
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'clave' => $request->clave,
            'rol' => 'cliente',
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();

        Log::channel('autenticacion')->info('Registro de cliente', [
            'usuario_id' => $usuario->id,
            'correo' => $usuario->correo,
            'ip' => $request->ip(),
        ]);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $usuario = Auth::user();

        Log::channel('autenticacion')->info('Logout', [
            'usuario_id' => $usuario?->id,
            'correo' => $usuario?->correo,
            'ip' => $request->ip(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }
}
