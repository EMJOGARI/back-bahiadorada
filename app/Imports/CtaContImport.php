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
        /*
        try {
            $data = new Cta_cont([

                $bs = (float)(number_format((float)$row['total_bs'], 3, '.', ',')),
                $ss = (float)(number_format((float)$row['total'], 3, '.', ',')),
                $re = str_replace($row['total'], ",", "5454"),
                'id_ctacontable'  => $row['id_ctacontable'],
                'cod_ctacontable' => $row['nodo'],
                'nomctacontable' => $row['ctacontable'],
                'mo_ctacontable_bs' => $row['total_bs'],//$bs,
                'mo_ctacontable_ss' => $row['total_bs'],//$ss
            ]);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();

             foreach ($failures as $failure) {
                 $failure->row(); // row that went wrong
                 $failure->attribute(); // either heading key (if using heading row concern) or column index
                 $failure->errors(); // Actual error messages from Laravel validator
                 $failure->values(); // The values of the row that has failed.
             }
        }*/

        $data = new Cta_cont([
            $bs = (double)(number_format((double)$row['total_bs'], 3, '.', ',')),
            $ss = (float)(number_format((float)$row['total'], 3, '.', ',')),
            $re = str_replace($row['total'], ",", "5454"),
            'id_ctacontable'  => $row['id_ctacontable'],
            'cod_ctacontable' => $row['nodo'],
            'nomctacontable' => $row['ctacontable'],
            'mo_ctacontable_bs' => $bs,
            'mo_ctacontable_ss' => $ss
        ]);
        dd($row, $data, $bs, $ss, $re);
        return $data;
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
