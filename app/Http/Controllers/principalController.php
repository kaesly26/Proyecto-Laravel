<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class principalController extends Controller
{
  public function ingresar()
  {
    return view('layouts.welcome');
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

    $Categoria = New Categoria();
    $Categoria->nombre_categoria = $request->input('nombre_categoria');
    $Categoria->descripcion_categoria = $request->input('descripcion_categoria');
    $Categoria->save();

    return view('layouts.principal');
  }
}
