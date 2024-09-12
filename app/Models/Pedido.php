<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'total_pedido',
        'estado',
        'fecha_pedido',
        'detalles_pedido',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_productos', 'pedido_id', 'producto_id')
            ->withPivot('cantidad')
            ->withTimestamps();
    }

    public function cliente()
    {
        return $this->belongsTo(Persona::class, 'cliente_id');
    }
}
