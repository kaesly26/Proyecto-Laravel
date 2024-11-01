<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class productoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('showProduct', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('crearProducto', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
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

        return redirect()->route('productos.index');
    }
    public function edit(string $id)
    {
        $update = Producto::find($id);
        $categorias = Categoria::all();
        return view('crearProducto', compact('update', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:4|max:100',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|min:10|max:200',
            'id_categoria' => 'required|exists:categorias,id_categoria',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre_producto = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->id_categoria = $request->input('id_categoria');
        $producto->save();

        return redirect()->route('productos.index');
    }



    public function destroy($id_producto)
    {
        $eliminar = Producto::findOrFail($id_producto);
        $eliminar->delete();
        return redirect()->route('productos.index');
    }
}
