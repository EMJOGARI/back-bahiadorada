<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuotas'; // Nombre de la tabla
    protected $primaryKey = 'id_vivienda'; // Clave primaria
    
    // Columnas de la tabla
    protected $fillable = [  
        'id_vivienda',      
        'fe_emision',
        'fe_vencimiento',
        'fe_pago',
        'mo_cuota',
        'mora_cuota',
        'abono_cuota',
        'saldo_cuota',
        'tipo',
        'status',
    ];
}
