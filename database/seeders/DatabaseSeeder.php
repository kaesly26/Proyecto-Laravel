<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Persona;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $personas = Persona::factory()->count(5)->create();
        Producto::factory()->count(5)->create();
        Categoria::factory()->count(5)->create();
        Pedido::factory()->count(5)->create([
            'cliente_id' => $personas->random()->id, // Asigna un cliente existente
        ]);
        PedidoProducto::factory()->count(5)->create();
    }
}
