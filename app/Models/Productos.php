<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Productos extends Model
{
    use HasFactory;

    // Atributos permitidos para asignación masiva
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
    ];
}
