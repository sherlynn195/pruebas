<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\Usuario;

class CategoriaPolicy
{
    public function create(Usuario $usuario): bool
    {
        return in_array($usuario->rol, ['gerente', 'administrador']);
    }

    public function update(Usuario $usuario, Categoria $categoria): bool
    {
        return in_array($usuario->rol, ['gerente', 'administrador']);
    }

    public function delete(Usuario $usuario, Categoria $categoria): bool
    {
        return in_array($usuario->rol, ['gerente', 'administrador']);
    }
}