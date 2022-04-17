<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tipo_documento' =>$this->faker->randomElement($array = array ('cc','nit')),
            'documento' => $this->faker->isbn10,
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastname,
            'correo' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->unique()->phoneNumber,
            'estado' => $this->faker->randomElement($array = array ('1','0')),
        ];
    }
}