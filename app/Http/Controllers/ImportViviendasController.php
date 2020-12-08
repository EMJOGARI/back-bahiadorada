<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\ViviendaImport;

class ImportViviendasController extends Controller
{
    public function index()
    {
        return view('import.vivienda.index');
    }
    public function importViviendaCsv(Request $request)
    {
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            Excel::import(new ViviendaImport,$request->file);

            flash('Viviendas Cargadas')->success();
        }catch(\Exception $e){
            //dd($e);
            flash('Error al cargar el archivo'. $request->file .'verifique las columnas')->warning();
        }
        return view('import.vivienda.index');
    }
}
