<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ResolucionGdh extends Model
{
    use HasFactory;

    protected $table = 'resolucion_gdh'; // Nombre de la tabla en la BD
    protected $primaryKey = 'idresolucion_gdh'; // Clave primaria personalizada
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // Es un entero
    protected $fillable = ['num_resolucion', 'fecha_emision', 'archivo_gdh', 'grupo_idgrupo']; // Campos permitidos

    // 🔹 Asegura que Laravel use 'idresolucion_gdh' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idresolucion_gdh';
    }

    // 🔹 Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_idgrupo', 'idgrupo');
    }
}
