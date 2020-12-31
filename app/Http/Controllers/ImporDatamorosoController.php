<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GraficosImport;

class ImporDatamorosoController extends Controller
{
    public function index()
    {
        return view('import.bahia.index');
    }

    public function importDataMorosoCsv(Request $request)
    {
       try{
           $this->validate($request, [
               'file'  => 'required|mimes:cvs,txt'
           ],
           [
               'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
           ]);

           Excel::import(new GraficosImport,$request->file);

           flash('BAHIA AL DIA Informacion Cargada')->success();
       }catch(\Exception $e){
           flash('Error al cargar el archivo'. $request->file)->warning();
       }
        return view('import.ctacont.index');
    }
}
