<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    // Evita repetir correos (la columna correo es única)
    protected static array $usados = [];

    public function definition(): array
    {
        $nombres = ['Juan', 'Mario', 'Maria', 'Pedro'];
        $apellidos = ['Lopez', 'Sanchez', 'Hernandez', 'Martinez'];

        do {
            $nombre = $this->faker->randomElement($nombres);
            $apellido = $this->faker->randomElement($apellidos);
            $correo = strtolower(substr($nombre, 0, 1).$apellido).'@tuxtla.tecnm.mx';
        } while (in_array($correo, static::$usados));

        static::$usados[] = $correo;

        return [
            'nombre' => $nombre,
            'apellidos' => $apellido,
            'correo' => $correo,
            'clave' => Hash::make('123'),
            'rol' => $this->faker->randomElement(['cliente', 'gerente']),
        ];
    }
}
