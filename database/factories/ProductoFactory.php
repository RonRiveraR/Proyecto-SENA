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
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                'body halter amarillo',
                'body halter rojo',
                'body halter azul',
                'body halter negro',
                'body halter blanco',
                'body halter rosado',
                'body halter verde',
                'body cuadrado amarillo',
                'body cuadrado rojo',
                'body cuadrado azul',
                'body cuadrado negro',
                'body cuadrado blanco',
                'body cuadrado rosado',
                'body cuadrado verde',
            ]),
            'talla' => $this->faker->randomElement(['xs', 's', 'm', 'l', 'xl']),
            'cantidad' => $this->faker->numberBetween(0, 50),
            'color' => $this->faker->randomElement([
                'pendiente',
                'realizado'
            ]),
            'tipoDeTela' => $this->faker->randomElement(['seul', 'aqualite']),
            'descripcion' => $this->faker->sentence(5),
        ];
    }
}
