<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $primaryKey = 'idcategoria';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['tipo'];

    public function getRouteKeyName()
    {
        return 'idcategoria';
    }
}
