<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargo'; // ⚠️ Laravel usa "cargos" por defecto, aquí lo corregimos.
    protected $primaryKey = 'idcargo'; // Clave primaria personalizada
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // Es un entero
    protected $fillable = ['tipo_cargo']; // Campos permitidos para asignación masiva

    // 🔹 Asegura que Laravel use 'idcargo' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idcargo';
    }
}
