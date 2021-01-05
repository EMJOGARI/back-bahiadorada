<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GraficosImport;
use Illuminate\Support\Facades\DB;

class ImportDatamorosoController extends Controller
{
    public function index()
    {
        return view('import.datamoroso.index');
    }

    public function importDataMorosoCsv(Request $request)
    {
        $count =  DB::table('datamosoridad')->count();
       try{
           $this->validate($request, [
               'file'  => 'required|mimes:cvs,txt'
           ],
           [
               'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
           ]);
        //dd($count);

        if ($count >= 1){
            DB::table('datamosoridad')->truncate();
            Excel::import(new GraficosImport,$request->file);
        }else{
            Excel::import(new GraficosImport,$request->file);
        }
           flash('BAHIA AL DIA Informacion Cargada')->success();
       }catch(\Exception $e){
           dd($e);
           flash('Error al cargar el archivo')->warning();
       }
        return view('import.datamoroso.index');
    }
}
