<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;

class CatalogoController extends Controller
{
    public function index()
    {
        $productos = [
            [
                'nombre' => 'Playera básica',
                'descripcion' => 'Playera cómoda para uso diario.',
                'precio' => 199.00,
                'imagen' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'nombre' => 'Mochila casual',
                'descripcion' => 'Mochila práctica para todos los días.',
                'precio' => 449.00,
'imagen' => 'https://images.unsplash.com/photo-1622560480654-d96214fdc887?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'nombre' => 'Tenis urbanos',
                'descripcion' => 'Diseño casual para combinar con tu estilo.',
                'precio' => 699.00,
               'imagen' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=700&q=80',
            ],
            [
                'nombre' => 'Reloj moderno',
                'descripcion' => 'Un accesorio sencillo y elegante.',
                'precio' => 549.00,
                'imagen' => 'https://images.unsplash.com/photo-1524805444758-089113d48a6d?auto=format&fit=crop&w=700&q=80',
            ],
        ];
        return view('cliente.catalogo', compact('productos'));
    }
}
