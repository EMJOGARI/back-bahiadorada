<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\EdoCtaImport;

class ImportEdoCtaController extends Controller
{
    public function index()
    {
        return view('import.edocta.index');
    }
    public function importEdoCtaCsv(Request $request)
    {
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            Excel::import(new EdoCtaImport,$request->file);

            flash('Estados de Cuenta Cargados')->success();
        }catch(\Exception $e){
            //dd($e);
            flash('Error al cargar el archivo'. $request->file .'verifique las columnas numerica separando con (.) los decimales')->warning();
        }

        return view('import.edocta.index');
    }
}
