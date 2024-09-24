<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class categoriaController extends Controller
{
   public function index()
    {
        $categorias = Categoria::all();
        return view('showCategory', compact('categorias'));
    }

    public function create()
    {
        return view('createCategoria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|min:4|max:100',
            'descripcion_categoria' => 'required|string|min:10|max:200'
        ]);

        $categoria = new Categoria();
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->save();

        return redirect()->route('categoria.index');
    }
    public function edit(string $id)
    {
        $update = Categoria::find($id);
        return view('createCategoria', compact('update'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|min:4|max:100',
            'descripcion_categoria' => 'required|string|min:10|max:200'
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre_categoria = $request->input('nombre_categoria');
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->save();

        return redirect()->route('categoria.index');
    }

    public function destroy($id)
    {
        $eliminar = Categoria::findOrFail($id);
        $eliminar->delete();
        return redirect()->route('categoria.index');
    }
}
