<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            // Descomentar cuando existan (los crean los compañeros):
            // CategoriaSeeder::class,
            // ProductoSeeder::class,
            // VentaSeeder::class,
        ]);
    }
}
