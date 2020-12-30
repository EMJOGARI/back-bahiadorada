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
        $chart = new MorososCrart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('charst.index', compact('chart'));
    }
}
