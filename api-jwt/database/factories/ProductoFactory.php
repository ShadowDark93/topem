<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'stock' => $this->faker->numberBetween($min = 1, $max = 900),
            'precio' => $this->faker->numberBetween($min = 100, $max = 100000),
            'iva' => $this->faker->randomElement($array = array('0.19', '0')),
            'estado'=>'1',
        ];
    }
}