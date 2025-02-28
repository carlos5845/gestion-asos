<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ActaConstatacion extends Model
{
    use HasFactory;

    protected $table = 'acta_constatacion'; // Nombre de la tabla en la BD
    protected $primaryKey = 'idacta_constatacion'; // Clave primaria personalizada
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // Es un entero
    protected $fillable = ['num_constatacion']; // Campos permitidos para asignación masiva

    // 🔹 Asegura que Laravel use 'idacta_constatacion' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idacta_constatacion';
    }
}
