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
            'id_vivienda' => $row['id_vivienda'],
            'cod_cuota' => $row['cod_cuota'],
            'fe_emision' => $row['fe_emision'],
            'fe_vencimiento' => $row['fe_vencimiento'],
            'fe_pago' => $row['fe_cobro'],
            'mo_cuota' => $row['mo_cuota'],
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
