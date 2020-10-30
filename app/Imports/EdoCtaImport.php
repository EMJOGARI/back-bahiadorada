<?php

namespace App\Imports;

use App\Cuota;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};
use Illuminate\Support\Str;

class EdoCtaImport implements ToModel, WithCustomCsvSettings , WithHeadingRow
{   
    public function model(array $row)
    {
        $data = new Cuota([
            'id' => $row['id'], 
            'id_vivienda' => $row['id_vivienda'],      
            'fe_emision' => $row['fecha_emision'],
            'fe_vencimiento' => $row['fecha_vencimiento'],
            'fe_pago' => $row['fecha_pago'],
            'mo_cuota' => $row['monto_cuota'],
            'mora_cuota' => $row['mora_cuota'],
            'abono_cuota' => $row['abono_cuota'],
            'saldo_cuota' => $row['saldo_cuota'],
            'tipo' => $row['tipo'],
            'status' => $row['status'], 
        ]);
        return $data;
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
