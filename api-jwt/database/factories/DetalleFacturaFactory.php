<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleFactura>
 */
class DetalleFacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'factura_id' => Factura::factory(),
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween($min = 1, $max = 900),
            'valor_unitario' => $this->faker->numberBetween($min = 100, $max = 100000),
            'valor_total' => $this->faker->numberBetween($min = 100, $max = 100000),
            'estado' => '1',
        ];
    }
}
