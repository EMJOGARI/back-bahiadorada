<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EdoCtaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(permissionsAmin()){
            $datos = DB::table('viviendas as v')
            ->join('cuotas as c','c.id_vivienda','v.id')
            ->get();
        }else{
            $datos = DB::table('viviendas as v')
            ->join('cuotas as c','c.id_vivienda','v.id')
            ->where('v.id_usuario',$user->id_propietario)
            ->get();
        } 
       // dd($datos);
        return view('estado-cuenta.index', compact('datos'));
    }
}
