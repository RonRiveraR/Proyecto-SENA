<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad' => $this->faker->numberBetween(1, 100),
            'producto' => $this->faker->numberBetween(0, 50),
            'estado' => $this->faker->randomElement(['pendiente', 'realizado']),
            //'idcliente' => $this->faker->numberBetween(0, 50),
        ];
    }
}
