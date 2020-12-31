<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grafico extends Model
{
    protected $table = 'datamosoridad'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    // Columnas de la tabla
    protected $fillable = [
        'id_vivienda',
        'vivienda',
        'propiedad',
        'alicuota',
        'cuota_mensual',
        'cant_ordi_pend',
        'cant_extra_pend',
        'cant_cuotas_pend',
        'cant_dias_vencidos',
        'cuotas_ordinarias',
        'cuotas_extra_ordinarias',
        'monto_deuda',
        'notas_de_credito',

    ];
}
