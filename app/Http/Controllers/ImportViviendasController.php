<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\ViviendaImport;
use Illuminate\Support\Facades\DB;

class ImportViviendasController extends Controller
{
    public function index()
    {
        return view('import.vivienda.index');
    }
    public function importViviendaCsv(Request $request)
    {
        $count =  DB::table('viviendas')->count();
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            //if ($count >= 1){
            //    DB::table('viviendas')->truncate();
            //    Excel::import(new ViviendaImport,$request->file);
            //}else{
                Excel::import(new ViviendaImport,$request->file);
            //}

            flash('Viviendas Cargadas')->success();
        }catch(\Exception $e){
            //dd($e)
            flash('Error al cargar el archivo'. $request->file)->warning();
        }
        return view('import.vivienda.index');
    }
}
