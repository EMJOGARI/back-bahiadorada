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
        ->get();


       dd( $datos);
        return view('cuenta-contable.index', compact('datos'));
    }
}
