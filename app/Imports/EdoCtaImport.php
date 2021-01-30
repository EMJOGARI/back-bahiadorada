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
            'saldo_cuota' => $row['saldo_cuota'],
            'tipo' => $row['tipo'],
            'status' => $row['status'],
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
