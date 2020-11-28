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
    public function index(Request $request)
    {
        $user = Auth::user();
        $living = "";
        $livingplace = $request->livingplace;

        if(permissionsAmin()){
            $living = Vivienda::all();
            $datos = DB::table('viviendas as v')
            ->join('cuotas as c','c.id_vivienda','v.id_vivienda')
            ->get();
        }else{
            $living = Vivienda::where('id_usuario',$user->id_user);
            $datos = DB::table('viviendas as v')
            ->join('cuotas as c','c.id_vivienda','v.id_vivienda')
            ->where('v.id_usuario',$user->id_user)
            ->when($livingplace, function ($query, $livingplace) {
                return $query->where('v.id_vivienda','=',$livingplace);
            })
            ->get();
        }

        dd($datos,$living);
        return view('cuotas.index', compact('datos','living'));

    }
}
