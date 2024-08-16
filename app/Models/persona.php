<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'birthdate',
        'email',
        'user_photo',
    ];
}
