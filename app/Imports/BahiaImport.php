<?php

namespace App\Imports;

use App\Bahia;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};

class BahiaImport implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = new Bahia([
            'fecha'  => $row['fecha'],
            'area' => $row['area'],
            'actividad' => $row['actividad'],
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
