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
        /* $file = $request->file('file');
         Excel::import(new CtaContImport, $file);*/
         //dd($file);
         //dd($request->file);
         //'sueldo'=>'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/
        // try{

            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            Excel::import(new CtaContImport,$request->file);

            flash('Cuentas Contables Cargados')->success();
      //  }catch(\Exception $e){

          //  flash('Error al cargar el archivo verifique las columnas')->warning();

    	//}

/*
            dd($request->file);

            flash('Cuentas Contables Cargados')->success();*/

         return view('import.ctacont.index');
     }
}
