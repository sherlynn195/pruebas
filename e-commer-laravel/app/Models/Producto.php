<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'precio', 'existencia', 'usuario_id'];

    // Un producto pertenece a un usuario (vendedor/gerente)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Un producto puede pertenecer a muchas categorías
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto');
    }
}