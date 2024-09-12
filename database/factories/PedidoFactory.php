<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition()
    {
        return [
            'cliente_id' => $this->faker->numberBetween(1, 10), // Asume que tienes clientes con IDs entre 1 y 10
            'total_pedido' => $this->faker->randomFloat(2, 100, 500), // Total entre 100 y 500
            'estado' => $this->faker->randomElement(['pendiente', 'preparando', 'entregado', 'cancelado']),
            'fecha_pedido' => $this->faker->dateTimeThisYear(),
            'detalles_pedido' => $this->faker->paragraph(),
        ];
    }
}
