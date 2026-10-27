<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    // Una categoría tiene muchos productos (relación N:M)
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'categoria_producto');
    }
}