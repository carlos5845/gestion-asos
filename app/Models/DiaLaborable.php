<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
class DiaLaborable extends Model
{
    use HasFactory;

    protected $table = 'dia_laborable'; // Nombre de la tabla en la BD
    protected $primaryKey = 'iddia_laborable'; // Clave primaria personalizada
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // Es un entero
    protected $fillable = ['dia']; // Campos permitidos

    // 🔹 Asegura que Laravel use 'iddia_laborable' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'iddia_laborable';
    }
}
