<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CtaContController extends Controller
{
    public function index()
    {// $ss = number_format((float)$row['total'], 3, ',', '.'),

        $datos = DB::table('resumenctascont')
            ->select('id_ctacontable','nomctacontable','cod_ctacontable', DB::raw('SUM(mo_ctacontable_bs) as mo_ctacontable_bs'), DB::raw('SUM(mo_ctacontable_ss) as mo_ctacontable_ss'))
            ->groupBy('id_ctacontable','nomctacontable','cod_ctacontable')
            ->get();

           // dd($datos);

        return view('cuenta-contable.index', compact('datos'));
    }
}
