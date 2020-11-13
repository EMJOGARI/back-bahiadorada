<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Vivienda;

class ViviendasController extends Controller
{
    public function index()
    {
        $datos = DB::table('viviendas as v')
            ->join('users as u','u.id_propietario','v.id_usuario')
            ->get();          
        return view('viviendas.index', compact('datos'));
    } 
    public function show($id_usuario)
    {   
        $id = decrypt($id_usuario);     
        $vivienda = DB::table('viviendas')
        ->where('id_usuario',$id)
        ->first();

        $user = DB::table('users as u')
        ->where('id_propietario',$vivienda->id_usuario)
        ->first();
        
        $ctacon = DB::table('cuotas')
            ->where('id_vivienda',$vivienda->id)
            ->get();
         
           // dd($vivienda, $user, $ctacon);          
        return view("viviendas.show", compact('user','vivienda','ctacon'));
    }
    
}
