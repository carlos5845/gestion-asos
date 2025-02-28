<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VigenciaPoder extends Model
{
    use HasFactory;

    protected $table = 'vigencia_poder'; // Nombre de la tabla en la BD
    protected $primaryKey = 'idvigencia_poder'; // Clave primaria personalizada
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // Es un entero
    protected $fillable = ['partida_registral', 'archivo_vigencia', 'grupo_idgrupo']; // Campos permitidos

    // 🔹 Asegura que Laravel use 'idvigencia_poder' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idvigencia_poder';
    }

    // 🔹 Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_idgrupo', 'idgrupo');
    }
}
