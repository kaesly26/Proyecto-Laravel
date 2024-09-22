<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Persona;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
  public function index()
  {
    $pedidos = Pedido::with(['productos', 'cliente'])
      ->paginate(10);

    return view('pedidos', compact('pedidos'));
  }

  public function show($id)
  {
    $pedido = Pedido::with('productos')->findOrFail($id);

    // Devuelve los productos del pedido en formato JSON
    return response()->json($pedido->productos);
  }
}
