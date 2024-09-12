<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'birthdate',
        'email',
        'user_photo',
    ];

    public function getUserPhotoUrlAttribute()
    {
        return $this->user_photo ? Storage::url($this->user_photo) : asset('img/user_pred.webp');
    }
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }

}

