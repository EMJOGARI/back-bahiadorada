<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cta_cont extends Model
{
    protected $table = 'resumenctascont'; // Nombre de la tabla
    protected $primaryKey = 'id_ctacontable'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = [
        'id_ctacontable',
        'nomctacontable',
        'cod_ctacontable',
        'mo_ctacontable_bs',
        'mo_ctacontable_ss'
    ];
}
