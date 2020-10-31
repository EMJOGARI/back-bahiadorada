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
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        flash('Usuarios Cargados')->success();

        return view('import.users.index');
    }
}
