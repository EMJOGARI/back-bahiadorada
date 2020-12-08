<?php

namespace App\Imports;

use App\Vivienda;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};

class ViviendaImport implements ToModel, WithCustomCsvSettings , WithHeadingRow
{
    public function model(array $row)
    {
        //dd($row);
        $data = new Vivienda([
            'id_usuario' => $row['id_usuario'],
            'id_vivienda'  => $row['id_vivienda'],
            'vivienda' => $row['vivienda'],
            ]);
        //dd($data);
        return  $data;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
