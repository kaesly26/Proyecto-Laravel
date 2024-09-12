<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{

    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre_producto' => $this->faker->word(), 
            'precio' => $this->faker->randomFloat(2, 1, 100), 
            'descripcion' => $this->faker->optional()->paragraph(), 
            'id_categoria' => Categoria::factory(), 
        ];
    }
}
