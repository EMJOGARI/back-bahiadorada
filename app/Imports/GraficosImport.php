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
            'alicuota' => $row['alicuota'],
            'cuota_mensual' => $row['cuota_mensual'],
            'cant_ordi_pend' => $row['cant_ordi_pend'],
            'cant_extra_pend' => $row['cant_extra_pend'],
            'cant_cuotas_pend' => $row['cant_cuotas_pend'],
            'cant_dias_vencidos' => $row['cant_dias_vencidos'],
            'cuotas_ordinarias' => $row['cuotas_ordinarias'],
            'cuotas_extra_ordinarias' => $row['cuotas_extra_ordinarias'],
            'monto_deuda' => $row['monto_deuda'],
            'notas_de_credito' => $row['notas_de_credito'],
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
