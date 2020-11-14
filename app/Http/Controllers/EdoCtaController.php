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
            $datos = DB::table('users as u')
            ->join( 'viviendas as v','v.id','u.id_user')
            ->join('cuotas as c','c.id_vivienda','v.id_usuario')
            ->get();

            $saldo = 0;
            foreach ($datos as $cc) {
                if ($cc->status == 'PENDIENTE'){
                    $float = (float)$cc->saldo_cuota;
                    $saldo = $saldo + $float;
                }
                $pendiente = number_format($saldo, 2,',','.');
            }
        }else{
            $datos = DB::table('users as u')
            ->join('viviendas as v','v.id','u.id_user')
            ->join('cuotas as c','c.id_vivienda','v.id_usuario')
            ->where('u.id_user',$user->id_user)
            ->get();

            $saldo = 0;
            foreach ($datos as $cc) {
                if ($cc->status == 'PENDIENTE'){
                    $float = (float)$cc->saldo_cuota;
                    $saldo = $saldo + $float;
                }
                $pendiente = number_format($saldo, 2,',','.');
            }
        }

       //dd($datos, $pendiente);
        return view('estado-cuenta.index', compact('datos','pendiente'));
    }
}
