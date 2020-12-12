<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Vivienda;

class EdoCtaController extends Controller
{
    public function index(Request $request)
    {
        $pendiente = 0;
        $livingplace = $request->livingplace;
        $user = Auth::user();
        if(permissionsAmin()){
            $living = DB::table('users as u')
            ->join('viviendas as v','v.id_usuario','u.id_user')
            ->get();
            $datos = DB::table('users as u')
            ->join( 'viviendas as v','v.id_usuario','u.id_user')
            ->join('cuotas as c','c.id_vivienda','v.id_vivienda')
            ->when($livingplace, function ($query, $livingplace) {
                return $query->where('v.vivienda','like',$livingplace);
            })
            ->get();
            if ($datos != ""){
                $saldo = 0;
                foreach ($datos as $cc) {
                    if ($cc->status == 'PENDIENTE'){
                        $float = (float)$cc->saldo_cuota;
                        $saldo = $saldo + $float;
                    }
                    $pendiente = number_format($saldo, 2,',','.');
                }
            }
        }else{
            $living = DB::table('users as u')
                ->join('viviendas as v','v.id_usuario','u.id_user')
                ->where('u.id_user',$user->id_user)
                ->get();
            $datos = DB::table('users as u')
            ->join('viviendas as v','v.id_usuario','u.id_user')
            ->join('cuotas as c','c.id_vivienda','v.id_vivienda')
            ->where('u.id_user',$user->id_user)
            ->when($livingplace, function ($query, $livingplace) {
                return $query->where('v.vivienda','=',$livingplace);
            })
            ->get();

            if ($datos != ""){
                $saldo = 0;
                foreach ($datos as $cc) {
                    if ($cc->status == 'PENDIENTE'){
                        $float = (float)$cc->saldo_cuota;
                        $saldo = $saldo + $float;
                    }
                    $pendiente = number_format($saldo, 2,',','.');
                }
            }
        }

       //dd($datos, $living);
        return view('estado-cuenta.index', compact('datos','pendiente','living'));
    }
}
