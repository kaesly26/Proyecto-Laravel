<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class categoriaController extends Controller
{

    public function crearCategoria()
    {
        return view('createCategoria');
    }

    public function showCategory()
    {
        $categorias = Categoria::all();
        return view('showCategory', compact('categorias'));
    }
    public function guardarCategoria(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|min:4|max:100',
            'descripcion_categoria' => 'required|string|min:10|max:200'
        ]);

        $categoria = new Categoria();
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->save();

        return redirect()->route('lista');
    }
    public function eliminarCategoria($id)
    {
        $eliminar = Categoria::findOrFail($id);
        $eliminar->delete();
        return redirect()->route('lista');
    }
}
