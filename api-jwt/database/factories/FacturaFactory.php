<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'empresa_id'=>'1',
            'cliente_id'=> Cliente::factory(),
            'total_factura'=>$this->faker->numberBetween($min = 100, $max = 100000),
        ];
    }
}