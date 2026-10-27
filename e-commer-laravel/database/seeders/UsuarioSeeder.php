<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // El administrador se crea a mano: la factory solo genera gerentes y clientes
        Usuario::create([
            'nombre' => 'Admin',
            'apellidos' => 'Sistema',
            'correo' => 'admin@tuxtla.tecnm.mx',
            'clave' => Hash::make('123'),
            'rol' => 'administrador',
        ]);

        // Máximo 12 en total: son las combinaciones únicas de correo posibles
        Usuario::factory()->count(2)->create(['rol' => 'gerente']);
        Usuario::factory()->count(5)->create(['rol' => 'cliente']);
    }
}
