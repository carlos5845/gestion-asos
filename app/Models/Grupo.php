<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupo'; // Laravel espera 'grupos', así que especificamos 'grupo'
    protected $primaryKey = 'idgrupo'; // Especificamos la clave primaria
    public $incrementing = true; // Indica que 'idgrupo' es autoincremental
    protected $keyType = 'int'; // Define que la clave primaria es un entero
    protected $fillable = ['etiqueta_grupo', 'nombre_grupo', 'ubicacion', 'agrupamiento_idagrupamiento', 'categoria_idcategoria'];

    // 🔹 Asegura que Laravel use 'idgrupo' en las rutas en lugar de 'id'
   
    // 🔹 Relación con Agrupamiento
    public function agrupamiento()
    {
        return $this->belongsTo(Agrupamiento::class, 'agrupamiento_idagrupamiento', 'idagrupamiento');
    }

    // 🔹 Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_idcategoria', 'idcategoria');
    }
}
