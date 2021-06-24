<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahia extends Model
{
    protected $table = 'bahia-al-dia'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = [
        'fecha',
        'area',
        'actividad',
        'status'
    ];
}
