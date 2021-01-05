<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\CtaContImport;
use Illuminate\Support\Facades\DB;

class ImportCtaContController extends Controller
{
    public function index()
     {
         return view('import.ctacont.index');
     }
     public function importCtaContCsv(Request $request)
     {
        $count =  DB::table('resumenctascont')->count();
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            if ($count >= 1){
                DB::table('resumenctascont')->truncate();
                Excel::import(new CtaContImport,$request->file);
            }else{
                Excel::import(new CtaContImport,$request->file);
            }

            flash('Cuentas Contables Cargados')->success();
        }catch(\Exception $e){
            flash('Error al cargar el archivo'. $request->file )->warning();
        }

         return view('import.ctacont.index');
     }
}
