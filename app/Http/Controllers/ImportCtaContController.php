<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\CtaContImport;

class ImportCtaContController extends Controller
{
    public function index()
     {
         return view('import.ctacont.index');
     }
     public function importCtaContCsv(Request $request)
     {
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            Excel::import(new CtaContImport,$request->file);

            flash('Cuentas Contables Cargados')->success();
        }catch(\Exception $e){
            flash('Error al cargar el archivo'. $request->file .'verifique las columnas numerica separando con (.) los decimales')->warning();
        }

         /* $file = $request->file('file');
         Excel::import(new CtaContImport, $file);*/
         //dd($file);
         //dd($request->file);
         //'sueldo'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/

         return view('import.ctacont.index');
     }
}
