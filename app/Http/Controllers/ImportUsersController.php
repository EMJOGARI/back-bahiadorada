<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\DB;
use App\User;


class ImportUsersController extends Controller
{
    public function index()
    {
        return view('import.users.index');
    }
    public function importUsersCsv(Request $request)
    {
        $count =  DB::table('users')->count();
        try{
            $this->validate($request, [
                'file'  => 'required|mimes:cvs,txt'
            ],
            [
                'file.mimes' => 'Tipo de archivo permitido es CVS o TXT'
            ]);

            if ($count >= 1){
                DB::table('users')->truncate();
                Excel::import(new UsersImport,$request->file);
            }else{
                Excel::import(new UsersImport,$request->file);
            }

            flash('Usuarios Cargados')->success();
        }catch(\Exception $e){
            flash('Error al cargar el archivo'. $request->file)->warning();
        }

        return view('import.users.index');
    }
}
