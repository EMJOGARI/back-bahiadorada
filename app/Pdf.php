<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table = 'file'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = [
        'name',
        'description',
        'name_original',
        'link'
    ];
}
