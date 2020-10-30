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
        $file = $request->file('file');
        Excel::import(new EdoCtaImport, $file);

        flash('Estados de Cuentas Cargados')->success();

        return view('import.edocta.index');
    }
}
