<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class principalController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function ingresar()
  {
    return view('layouts.principal');
  }

  public function crearCategoria()
  {
    return view('createCategoria');
  }

  public function guardarCategoria(Request $request)
  {
    $request->validate([
      'nombre_categoria'=> 'required|string|min:4|max:100',
      'descripcion_categoria'=>'required|string|min:10|max:200'
    ]);

    $categoria = New Categoria();
    $categoria->nombre_categoria = $request->input('nombre_categoria');
    $categoria->descripcion_categoria = $request->input('descripcion_categoria');
    $categoria->save();

    return view('layouts.principal');
  }

  public function crearProductos(){
    $categorias = Categoria::all();
    return view('crearProducto', compact('categorias'));
  }

  public function guardarProducto(Request $request)
  {
    $request->validate([
      'nombre' => 'required|string|min:4|max:100',
      'precio' => 'required|numeric|min:0',
      'descripcion' => 'required|min:10|max:200',
      'id_categoria' => 'required|exists:categorias,id_categoria',
    ],
      [
        'nombre.required' => 'El nombre del producto es obligatorio.',
        'nombre.min' => 'El nombre del producto debe tener al menos 4 caracteres.',
        'precio.required' => 'El precio es obligatorio.',
        'precio.numeric' => 'El precio debe ser un número.',
        'descripcion.required' => 'La descripción es obligatoria.',
        'descripcion.min' => 'La descripción debe tener al menos 10 caracteres.',
        'id_categoria.required' => 'Debe seleccionar una categoría.',
        'id_categoria.exists' => 'La categoría seleccionada no es válida.',
      ]
    );


    $producto = new Producto();
    $producto->nombre_producto = $request->input('nombre');
    $producto->precio = $request->input('precio');
    $producto->descripcion = $request->input('descripcion');
    $producto->id_categoria = $request->input('id_categoria');
    $producto->save();
    
    return view('layouts.principal');
  }
}
