<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    protected $table = 'viviendas'; // Nombre de la tabla
    protected $primaryKey = 'id_usuario'; // Clave primaria
    
    // Columnas de la tabla
    protected $fillable = [
        'id_usuario','vivienda'
    ];
}
