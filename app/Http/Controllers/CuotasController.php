<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Vivienda;
use App\Cuota;

class CuotasController extends Controller
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
            ->where('v.id_usuario',$user->id)
            ->get();
        }
        return view('cuotas.index', compact('datos'));

    }
}
