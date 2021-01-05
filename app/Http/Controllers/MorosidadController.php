<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grafico;

class MorosidadController extends Controller
{
    public function index(Request $request)
    {
        $datos=Grafico::all();
        return view('morosidad.index', compact('datos'));
    }
}
