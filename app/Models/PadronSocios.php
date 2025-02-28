<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PadronSocios extends Model
{
    use HasFactory;

    protected $table = 'padron_socios'; // Laravel espera 'padron_socios'
    protected $primaryKey = 'idpadron_socios'; // Especificamos la clave primaria
    public $incrementing = true; // Indica que 'idpadron_socios' es autoincremental
    protected $keyType = 'int'; // Define que la clave primaria es un entero
    protected $fillable = ['archivo_padron', 'grupo_idgrupo'];

    // 🔹 Asegura que Laravel use 'idpadron_socios' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idpadron_socios';
    }

    // 🔹 Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_idgrupo', 'idgrupo');
    }
}
