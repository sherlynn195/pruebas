<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Tecnología',
            'descripcion' => 'Dispositivos y gadgets'
        ]);
        
        Categoria::create([
            'nombre' => 'Hogar',
            'descripcion' => 'Artículos para el hogar'
        ]);
    }
}