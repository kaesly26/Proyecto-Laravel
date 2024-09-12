<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Persona;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidosNuevos = Pedido::with(['productos', 'cliente'])
        ->get();

        return view('pedidos', compact('pedidosNuevos'));
    }

    public function show($id)
    {
      $pedido = Pedido::with('productos')->findOrFail($id);

    // Devolver los productos en formato JSON
    return response()->json($pedido->productos);
    }
    
}
