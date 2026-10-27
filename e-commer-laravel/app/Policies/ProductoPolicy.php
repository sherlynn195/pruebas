<?php

namespace App\Policies;

use App\Models\Producto;
use App\Models\Usuario;

class ProductoPolicy
{
    public function create(Usuario $usuario): bool
    {
        return in_array($usuario->rol, ['gerente', 'administrador']);
    }

    public function update(Usuario $usuario, Producto $producto): bool
    {
        return in_array($usuario->rol, ['gerente', 'administrador']);
    }

    public function delete(Usuario $usuario, Producto $producto): bool
    {
        return in_array($usuario->rol, ['gerente', 'administrador']);
    }
}