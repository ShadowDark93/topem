<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=> 'Empresa x',
            'propietario'=>'David',
            'nit'=>'1234567890',
            'correo'=>'david@empresax.com',
            'telefono'=>'123456789'
        ];
    }
}