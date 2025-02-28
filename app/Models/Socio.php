<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Socio extends Model
{
    use HasFactory;

    protected $table = 'socio'; // Laravel espera 'socios', así que especificamos 'socio'
    protected $primaryKey = 'idsocio'; // Especificamos la clave primaria
    public $incrementing = true; // Indica que 'idsocio' es autoincremental
    protected $keyType = 'int'; // Define que la clave primaria es un entero
    protected $fillable = ['dni', 'nombre', 'apellido_pat', 'apellido_mat', 'departamento', 'provincia', 'distrito', 'grupo_idgrupo', 'cod_puesto', 'rubro', 'estado', 'observacion'];

    // 🔹 Asegura que Laravel use 'idsocio' en las rutas en lugar de 'id'
    public function getRouteKeyName()
    {
        return 'idsocio';
    }

    // 🔹 Relación con Grupo
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_idgrupo', 'idgrupo');
    }
}
