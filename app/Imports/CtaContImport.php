<?php

namespace App\Imports;

use App\Cta_cont;
use Maatwebsite\Excel\Concerns\{ToModel, WithCustomCsvSettings, WithHeadingRow};

class CtaContImport implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new Cta_cont([
            'id_ctacontable'  => $row['id_ctacontable'],
            'cod_ctacontable' => $row['nodo'],
            'nomctacontable' => $row['ctacontable'],
            'mo_ctacontable_bs' => $row['total_bs'],
            'mo_ctacontable_ss' => $row['total']

            /*
            "id_ctacontable" => 5
            "nodo" => 5
            "ctacontable" => "COSTOS"
            "total_bs" => 2333333
            "total" => "4,6666660000000000"
            */
        ]);
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
