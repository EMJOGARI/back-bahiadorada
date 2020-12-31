<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MorososCrart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Charts;

class ChrastController extends Controller
{
    public function slow_payer()
    {
        $borderColors = [
            "rgba(152, 191, 221, 1.0)",
            "rgba(246, 222, 50, 1.0)",
            "rgba(248, 210, 190, 1.0)",
            "rgba(247, 165, 176, 1.0)"
        ];
        $fillColors = [
            "rgba(152, 191, 221, 0.8)",
            "rgba(246, 222, 50, 0.8)",
            "rgba(248, 210, 190, 0.8)",
            "rgba(247, 165, 176, 0.8)"
        ];
        $chart = new MorososCrart;
        //$chart->minimalist(true);
        $chart->labels(['<= 0','>0 <= 60', '>60 <= 90', '>90']);
        $chart->dataset('Users by trimester', 'doughnut', [10, 25, 13, 20])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        return view('charst.index', compact('chart'));
    }
}
/*
ID. VIVIENDA
VIVIENDA
PROPIETARIO
ALICUOTA
CUOTA MENSULA
CANT. ORDI. PEND.
CANT. EXTRA. PEND.
CANT. CUOTAS PEND.
CANT. DIAS VENCIDOS
CUOTAS ORDINARIAS
CUOTAS EXTRA ORDINARIAS
MONTO DEUDA
NOTAS DE CREDITOS
*/
