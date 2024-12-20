<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_producto',$table = 'productos';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_productos', 'producto_id', 'pedido_id')
        ->withPivot('cantidad')
        ->withTimestamps();
    }
}
