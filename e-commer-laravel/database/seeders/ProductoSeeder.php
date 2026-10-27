<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Usuario;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gerente = Usuario::where('rol', 'gerente')->first();

        if ($gerente) {
            $producto = Producto::create([
                'nombre' => 'Laptop HP',
                'descripcion' => 'Laptop de 16GB RAM',
                'precio' => 12500.00,
                'existencia' => 10,
                'usuario_id' => $gerente->id
            ]);

            // Relacionar con categorías (ej. ID 1)
            $producto->categorias()->attach(1);
        }
    }
}