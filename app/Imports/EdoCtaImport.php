<?php

namespace App\Imports;

use App\Cuota;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};
use Carbon\Carbon;
use DataTime;

class EdoCtaImport implements ToModel, WithCustomCsvSettings , WithHeadingRow
{
    public function model(array $row)
    {
        //dd($row);
        $data = new Cuota([
            //'id' => $row['id'],
            'id_vivienda' => $row['id_vivienda'],
            'vivienda' => $row['vivienda'],
            'fe_emision' => $row['fecha_emision'],
            'fe_vencimiento' => $row['fecha_vencimiento'],
            'fe_pago' => $row['fecha_pago'],
            'mo_cuota' => $row['monto_cuota'],
            'mora_cuota' => $row['mora_cuota'],
            'abono_cuota' => $row['abono_cuota'],
                $saldo = $row['saldo_cuota'],
            'saldo_cuota' => (string) $saldo,
            'tipo' => $row['tipo'],
            'status' => $row['status'],
            //string('saldo_cuota'); number_format((double)$row['total_bs'], 3, '.', ',')
        ]);
        //dd($data);
        return $data;
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
