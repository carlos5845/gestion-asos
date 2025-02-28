<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JuntaDirectiva extends Model
{
    use HasFactory;

    protected $table = 'junta_directiva'; // Especificamos la tabla
    protected $primaryKey = 'idjunta_directiva'; // Clave primaria
    public $incrementing = true; // Es autoincremental
    protected $keyType = 'int'; // La clave primaria es un entero
    protected $fillable = [
        'socio_dni',
        'nom_apellido',
        'cargo_idcargo',
        'celular',
        'grupo_idgrupo',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];

    // 🔹 Asegura que Laravel use 'idjunta_directiva' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idjunta_directiva';
    }

    // 🔹 Relación con Cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_idcargo', 'idcargo');
    }


    // 🔹 Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_idgrupo', 'idgrupo');
    }
}
