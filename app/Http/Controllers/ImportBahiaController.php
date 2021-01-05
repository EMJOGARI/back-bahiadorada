<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BahiaImport;
use Illuminate\Support\Facades\DB;

class ImportBahiaController extends Controller
{
    //importBahiaCsv
    public function index()
    {
        return view('import.bahia.index');
    }
    public function importBahiaCsv(Request $request)
    {
        $count =  DB::table('bahia-al-dia')->count();
        try{
           $this->validate($request, [
               'file'  => 'required|mimes:cvs,txt'
           ],
           [
               'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
           ]);

           if ($count >= 1){
            DB::table('bahia-al-dia')->truncate();
                Excel::import(new BahiaImport,$request->file);
            }else{
                Excel::import(new BahiaImport,$request->file);
            }

           flash('BAHIA AL DIA Informacion Cargada')->success();
        }catch(\Exception $e){
           flash('Error al cargar el archivo'. $request->file)->warning();
        }
        return view('import.ctacont.index');
    }
}
