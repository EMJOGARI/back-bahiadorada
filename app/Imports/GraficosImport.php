<?php

namespace App\Imports;

use App\Grafico;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};

class GraficosImport implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        $data = new Grafico([
            'id_vivienda' => $row['id'],
            'vivienda' => $row['vivienda'],
            'propietario' => $row['propietario'],
            'alicuota' => $row['mo_alicuota'],
            'cuota_mensual' => $row['mensualidad'],
            'cant_ordi_pend' => $row['ca_cuotordipend'],
            'cant_extra_pend' => $row['ca_cuotextraordipend'],
            'cant_cuotas_pend' => $row['ca_cuota_pend'],
            'cant_dias_vencidos' => $row['ca_dias_vencido'],
            'cuotas_ordinarias' => $row['mo_ordinarias_pendiente'],
            'cuotas_extra_ordinarias' => $row['mo_extraordinarias_pendiente'],
            'monto_deuda' => $row['mo_importe'],
            'notas_de_credito' => $row['notas_credito'],
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
