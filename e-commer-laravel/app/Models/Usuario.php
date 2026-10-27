<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'apellidos', 'correo', 'clave', 'rol'];

    protected $hidden = ['clave', 'remember_token'];

    protected function casts(): array
    {
        return [
            'clave' => 'hashed',
        ];
    }

    // Laravel busca la contraseña en la columna "password" por defecto.
    // Como aquí se llama "clave", se le indica dónde está.
    public function getAuthPassword()
    {
        return $this->clave;
    }

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'usuario_id');
    }

    public function ventasComoCliente(): HasMany
    {
        return $this->hasMany(Venta::class, 'cliente_id');
    }

    public function ventasComoVendedor(): HasMany
    {
        return $this->hasMany(Venta::class, 'vendedor_id');
    }

    // Categorías a través de los productos del usuario (Usuario -> Productos -> Categorías).
    // Pendiente: confirmar con el profesor si debe ser hasManyThrough; con una tabla
    // pivote no se puede declarar directamente, por eso se resuelve con whereHas.
    public function categorias()
    {
        return Categoria::whereHas('productos', fn ($q) => $q->where('usuario_id', $this->id));
    }

    public function esAdministrador(): bool
    {
        return $this->rol === 'administrador';
    }

    public function esGerente(): bool
    {
        return $this->rol === 'gerente';
    }

    public function esCliente(): bool
    {
        return $this->rol === 'cliente';
    }
}
