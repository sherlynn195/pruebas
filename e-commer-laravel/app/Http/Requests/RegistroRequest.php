<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'apellidos' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:255', 'unique:usuarios,correo'],
            'clave' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'Escribe tu nombre.',
            'apellidos.required' => 'Escribe tus apellidos.',
            'correo.required' => 'Escribe tu correo electrónico.',
            'correo.email' => 'Escribe un correo válido, por ejemplo nombre@correo.com.',
            'correo.unique' => 'Este correo ya está registrado.',
            'clave.required' => 'Escribe una contraseña.',
            'clave.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'clave.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }
}
