<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Persona;
use App\Models\Producto;
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
  public function create()
  {
    $clientes = Persona::all();
    $productos = Producto::all();
    return view('pedidosCreate', compact('clientes', 'productos'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'cliente_id' => 'required|exists:personas,id',
      'fecha_pedido' => 'required|date',
      'total_pedido' => 'required|numeric|min:0',
      'detalles_pedido' => 'nullable|string|max:200',
      'estado' => 'required|string|max:20',
      'productos.*.producto_id' => 'required|exists:productos,id_producto',
      'productos.*.cantidad' => 'required|integer|min:1',
    ]);

    // Crear el pedido
    $pedido = Pedido::create([
      'cliente_id' => $request->cliente_id,
      'fecha_pedido' => $request->fecha_pedido,
      'total_pedido' => $request->total_pedido,
      'detalles_pedido' => $request->detalles_pedido,
      'estado' => $request->estado,
    ]);

    // Asociar productos con sus cantidades
    foreach ($request->productos as $producto) {
      $pedido->productos()->attach($producto['producto_id'], ['cantidad' => $producto['cantidad']]);
    }

    return redirect()->route('pedidos.index');
  }

}
