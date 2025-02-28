<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agrupamiento extends Model
{
    use HasFactory;

    protected $table = 'agrupamiento'; // Laravel espera el plural, así que lo especificamos
    protected $primaryKey = 'idagrupamiento'; // Laravel espera 'id', hay que corregirlo
    public $incrementing = true; // Indica que 'idagrupamiento' es autoincremental
    protected $keyType = 'int'; // Define que la clave primaria es un número entero
    protected $fillable = ['cod_etiqueta', 'agrupamientocol']; // Permite inserciones masivas
    
}
