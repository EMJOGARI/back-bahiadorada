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
If {morosidad_viviendas.ca_dias_vencido} <= 0 Then
   Color (152, 191, 221 )
Else If {morosidad_viviendas.ca_dias_vencido} > 0 and {morosidad_viviendas.ca_dias_vencido} <= 60 Then
   Color (246, 222, 50 )
Else If {morosidad_viviendas.ca_dias_vencido} > 60 and {morosidad_viviendas.ca_dias_vencido} <= 90 Then
   Color (248, 210, 190)
Else If {morosidad_viviendas.ca_dias_vencido} > 90  Then
   Color (247, 165, 176 )
Else
    crNoColor
*/
