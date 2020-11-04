<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\User;

use Illuminate\Support\Facades\DB;

class ImportUsersController extends Controller
{
    public function index()
    {
        return view('import.users.index');
    }
    public function importUsersCsv(Request $request)
    {
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            Excel::import(new UsersImport,$request->file);

            flash('Usuarios Cargados')->success();
        }catch(\Exception $e){
            flash('Error al cargar el archivo'. $request->file .'verifique las columnas')->warning();
        }

        return view('import.users.index');
    }
}
