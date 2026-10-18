<?php

namespace Database\Seeders;
use App\Models\User; // <-- Importación necesaria
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['name'=>'Gerente','email'=>'gerente@test.com','password'=>Hash::make('password'),'rol'=>'gerente']);
User::create(['name'=>'Empleado','email'=>'empleado@test.com','password'=>Hash::make('password'),'rol'=>'empleado']);
User::create(['name'=>'Cliente','email'=>'cliente@test.com','password'=>Hash::make('password'),'rol'=>'cliente']);
    }
}
