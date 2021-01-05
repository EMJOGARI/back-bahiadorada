<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\MorososCrart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChrastController extends Controller
{
    public function slow_payer()
    {
        $data =  DB::table('datamosoridad')->count();

        $data1 = DB::table('datamosoridad')->where('cant_dias_vencidos','<=',0)->count();
        $data2 = DB::table('datamosoridad')
                    ->where('cant_dias_vencidos','>',0)
                    ->where('cant_dias_vencidos','<=',60)
                    ->count();
        $data3 = DB::table('datamosoridad')
                    ->where('cant_dias_vencidos','>',60)
                    ->where('cant_dias_vencidos','<=',90)
                    ->count();
        $data4 = DB::table('datamosoridad')->where('cant_dias_vencidos','>',90)->count();


        $fillColors = [
            "rgb(13, 132, 237, 0.8)",
            "rgb(247, 244, 25, 0.8)",
            "rgb(241, 131, 14, 0.8)",
            "rgb(241, 14, 14, 0.8)"
        ];

        $chart = new MorososCrart;
        $chart->labels(['SOLVENTES','CUOTAS VENCIDAS', 'PROXÍMO A LEGAL', 'DPTO LEGAL']);
        $chart->dataset('Personas', 'horizontalBar', [$data1, $data2, $data3, $data4])
            //->color($borderColors)
            ->backgroundcolor($fillColors);
        $chart->options([
            'legend' => [
                'display' => false,
                'position' => 'bottom',
                'labels' => [
                    'fontColor' => 'rgba(0, 0, 0)'
                ]
            ],
            'title' => [
                'display' => true,
                'text' => 'Morosidad'
            ],
            'animation' => [
                'animateScale' => true,
                'animateRotate' =>true
            ]
        ]);

        $chart_2 = new MorososCrart;
        $chart_2->minimalist(true);
        $chart_2->labels(['SOLVENTES','CUOTAS VENCIDAS', 'PROXÍMO A LEGAL', 'DPTO LEGAL']);
        $chart_2->dataset('', 'doughnut', [
                (number_format((double)(($data1/$data)*100), 2, '.', ',')),
                (number_format((double)(($data2/$data)*100), 2, '.', ',')),
                (number_format((double)(($data3/$data)*100), 2, '.', ',')),
                (number_format((double)(($data4/$data)*100), 2, '.', ','))
                ])
            //->color($borderColors)
            ->backgroundcolor($fillColors);
        $chart_2->options([
            'legend' => [
                'display' => true,
                'position' => 'right',
                'labels' => [
                    'fontColor' => 'rgba(0, 0, 0)'
                ]
            ],
            'title' => [
                'display' => true,
                'text' => 'Morosidad en (%)'
            ],
            'animation' => [
                'animateScale' => true,
                'animateRotate' =>true
            ],
        ]);


        return view('charst.index', compact('chart','chart_2'));
    }
}
