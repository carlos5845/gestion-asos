<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ActaConstitucion extends Model
{
    use HasFactory;

    protected $table = 'acta_constitucion'; // Nombre de la tabla en la BD
    protected $primaryKey = 'idacta_constitucion'; // Clave primaria personalizada
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // Es un entero
    protected $fillable = ['fecha_fundacion', 'archivo_acta', 'grupo_idgrupo']; // Campos permitidos para asignación masiva

    // 🔹 Asegura que Laravel use 'idacta_constitucion' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idacta_constitucion';
    }

    // 🔹 Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_idgrupo', 'idgrupo');
    }
}
