<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\EdoCtaImport;
use Illuminate\Support\Facades\DB;

class ImportEdoCtaController extends Controller
{
    public function index()
    {
        return view('import.edocta.index');
    }
    public function importEdoCtaCsv(Request $request)
    {
        $count =  DB::table('cuotas')->count();
        dd($count);
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            if ($count >= 1){
                DB::table('cuotas')->truncate();
                Excel::import(new EdoCtaImport,$request->file);
            }else{
                Excel::import(new EdoCtaImport,$request->file);
            }

            flash('Estados de Cuenta Cargados')->success();
        }catch(\Exception $e){
            //dd($e);
            flash('Error al cargar el archivo'. $request->file)->warning();
        }

        return view('import.edocta.index');
    }
}
