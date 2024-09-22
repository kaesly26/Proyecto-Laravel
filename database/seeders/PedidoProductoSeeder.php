<?php

namespace Database\Seeders;

use App\Models\PedidoProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedidoProducto::factory(5)->create();
    }
}
