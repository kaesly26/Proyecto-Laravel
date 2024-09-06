<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey= 'id_categoria', $table = 'categorias';

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
