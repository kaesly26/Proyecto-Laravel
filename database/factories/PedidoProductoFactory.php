<?php

namespace Database\Factories;

use App\Models\PedidoProducto;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoProductoFactory extends Factory
{
    protected $model = PedidoProducto::class;

    public function definition()
    {
        return [
            'pedido_id' => Pedido::factory(), 
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 5), 
        ];
    }
}
