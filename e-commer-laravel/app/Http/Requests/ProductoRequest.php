<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitir que la validación se ejecute
    }

    public function rules(): array
    {
        return [
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio'      => 'required|numeric|min:0',
            'existencia'  => 'required|integer|min:0',
            'categorias'  => 'nullable|array',
            'categorias.*'=> 'exists:categorias,id',
        ];
    }
}