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
        $data = new Grafico([
        'id_vivienda' => $row['fecha'],
        'vivienda' => $row['fecha'],
        'propiedad' => $row['fecha'],
        'alicuota' => $row['fecha'],
        'cuota_mensual' => $row['fecha'],
        'cant_ordi_pend' => $row['fecha'],
        'cant_extra_pend' => $row['fecha'],
        'cant_cuotas_pend' => $row['fecha'],
        'cant_dias_vencidos' => $row['fecha'],
        'cuotas_ordinarias' => $row['fecha'],
        'cuotas_extra_ordinarias' => $row['fecha'],
        'monto_deuda' => $row['fecha'],
        'notas_de_credito' => $row['fecha'],
        ]);
        dd($data);
        return $data;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
